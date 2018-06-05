<?php

namespace App\Http\Controllers\Admin\Stalk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StalkInsertRequest;
use App\User;
use App\Models\Stalk\Stalk;
use App\Models\Stalkinfo\Stalkinfo;
use DB;
class StalkController extends Controller
{
    /**
     * 主页
     * @return [type] [description]
     */
    public function index(Request $request)
    {
        //获取每页显示数
        $count = $request -> input('count',5);
        //获取要查询的关键字
        $search_sstitle = $request -> input('sstitle','');
        //获取所有限制参数
        $params = $request -> all();
        //查询数据
        $data = DB::table('bk_stalk')->where('sstitle','like','%'.$search_sstitle.'%')->paginate($count);

        //跳转到分类列表页面并分配数据
        return view('admin.stalk.index',['data'=>$data,'params'=>$params]);
    }

    /**
     * 添加页面显示
     * @return [type] [description]
     */
    public function create()
    {
        //显示添加页面
        return view('admin.stalk.create');
    }

    /**
     * 执行添加操作
     * @return [type] [description]
     */
    public function store(StalkInsertRequest $request)
    {
        //获取当前写说说的用户id
        $uid=session('id');
        //实例化对象
        $stalk = new Stalk;
        //获取当前管理员信息
        $userinfo=DB::table('bk_admin')->where('id',$uid)->select('name','myfile')->first();
        //接收表单数据
        $stalk->sstitle=$request->input('sstitle','');
        //对关联字段赋值
        $stalk->aid=$uid;
        $stalk->xfile=$userinfo->myfile;
        //插入数据
        $res1=$stalk->save();
        //实例化对象
        $stalkinfo = new Stalkinfo;
        //接收表单数据
        $stalkinfo->ssinfo=$request->input('ssinfo','');
        $stalkinfo->gname=$userinfo->name;
        $stalkinfo->sid=$stalk->id;
        $stalkinfo->aid=$uid;
        //插入数据
        $res2=$stalkinfo->save();
        //插入闪存数据
        $request->flashOnly('sstitle','ssinfo');
        //判断返回结果
        if($res1 && $res2)
        {
          return redirect('/admin/stalk')->with('success','添加成功');
        }
        else
        {
          return back()->with('error','添加失败');
        }
    }

    /**
     * 显示页面
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show($id)
    {
        // 查询数据
        $data = Stalk::find($id);
        $stalkinfo = $data -> stalkinfo;
        //跳转到分类列表页面并分配数据
        return view('admin.stalk.show',['data'=>$data, 'stalkinfo'=>$stalkinfo]);
    }

    /**
     * 删除操作
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
        //开启事务
        DB::beginTransaction();
        //查询数据
        $stalk = Stalk::find($id);
        //提取删除数据
        $res = $stalk->delete();
        $res2 = $stalk->stalkinfo->delete();
        // 获取与管理员表关联的id
        $abc1 = $stalk->aid;
        //获取当前登录的管理员id
        $abc2 = session('id');
        if($abc1 == $abc2){
            if ($res && $res2){
                //提交事务
                DB::commit();
                return redirect('/admin/stalk')->with('success','删除成功');
            }else{
                //事务回滚
               DB::rollBack();
               return back()->with('error','删除失败');
            }
        }else{
            return back()->with('error','只有作者才能删除这条说说');
        }
    }
}