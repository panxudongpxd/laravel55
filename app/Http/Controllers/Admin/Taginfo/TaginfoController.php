<?php

namespace App\Http\Controllers\Admin\Taginfo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Taginfo;
use App\Http\Requests\TaginfoInsertRequest;

class TaginfoController extends Controller
{
    /**
     * 首页
     * @return [type] [description]
     */
    public function index(Request $request)
    {
        // 接收分页的条数
         $count = $request -> input('count',5);
        $search_title = $request -> input('title','');
        // 以数组的方式接收所有的参数
        $params = $request -> all();
        // 查询
        $data = Taginfo::where('title','like','%'.$search_title.'%')->paginate($count);

        // 加载视图
        return view('admin.taginfo.index',['data'=>$data,'params'=>$params]);
    }

    /**
     * 添加页面
     * @return [type] [description]
     */
    public function create()
    {
        // 加载添加页面
        return view('admin.taginfo.create');
    }

    /**
     * 执行添加页面
     * @return [type] [description]
     */
    public function store(TaginfoInsertRequest $request)
    {
        // 自动验证
        // $this->validate($request, [
        // 'title' => 'required|unique:bg_tag_info',
        //  ],[
        //  'title.required' => '标签名称必填',
        //  'title.unique' => '标签名称已存在',
        //  ]);

        // 接收数据
        //dump($request -> all());
        $taginfo = new Taginfo;
        $taginfo -> title = $request -> input('title','');
        // 提交
        $res = $taginfo -> save();
        // 添加判断
        if($res){
            return redirect('/admin/taginfo')->with('success','添加成功！');
        }else{
            return back()->width('error','添加失败！');
        }
    }

    /**
     * 修改页面
     * @return [type] [description]
     */
    public function edit($id)
    {
        $data = Taginfo::find($id);
        return view('admin.taginfo.edit',['data'=>$data]);
    }

    /**
     * 执行修改操作
     * @return [type] [description]
     */
    public function update(TaginfoInsertRequest $request, $id)
    {
        // 自动验证
         // $this->validate($request, [
         // 'title' => 'required|unique:bk_tag_info',
         //  ],[
         //  'title.required' => '标签名称必填',
         //  'title.unique' => '标签名称已存在',
         //  ]);

        $data = Taginfo::find($id);
        $data -> title = $request -> input('title','');
        // 提交
        $res = $data -> save();
        // 添加判断
        if ($res) {
            return redirect('/admin/taginfo') -> with('success','修改成功');
        }else{
            return back() -> with('error','修改失败');
        }
    }

    /**
     * 删除操作
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
        $res = Taginfo::destroy($id);
        if($res){
            // 提交事务
            return redirect('/admin/taginfo')->with('success','删除成功！');
        }else{
            return back()->width('error','删除失败！');
        }
    }

}
