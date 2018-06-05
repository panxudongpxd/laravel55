<?php

namespace App\Http\Controllers\Admin\Blank;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Blank;
class BlankController extends Controller
{
    /**
     * 加载导航栏列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = '导航栏列表页面';
        //接收分页的条数
    	$count = $request -> input('count',5);
        //搜索
    	$search_btitle = $request -> input('btitlename');
        //以数组的方式接收所有的参数
    	$params = $request -> all();
        //加载视图
        $data = Blank::where('btitle','like','%'.$search_btitle.'%')->paginate($count);
        return view('admin.blank.blank',['data'=>$data,'params'=>$params,'title'=>$title]);
    }

    /**
     * 加载导航栏添加模板
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/blank/create',['title'=>'导航栏添加']);
    }

    /**
     * 执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证
    	$data = $request->validate([
 			'btitle' => 'required|unique:bk_blank',
 		],[
 			'btitle.required'=>'必填',
            'btitle.unique'   => '类名已存在！',
 		]);

        
        $blank = new Blank;
        //获取添加数据
        $blank -> btitle = $request -> input('btitle','');
        //保存
        $res = $blank -> save();
        if($res){
            //提交事务
        	return redirect('/admin/blank')->with('success','添加成功');
        }else{
        	return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * 加载修改模板
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$data = Blank::find($id);
        return view('admin.blank.edit',['data'=>$data]);
    }

    /**
     * 执行修改操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //通过id查找单条数据
        $blank = Blank::find($id);
        //获取修改数据
        $blank -> btitle = $request -> btitle;
        //保存
        $blank -> save();
        if($blank){
        //提交事务
        	return redirect('/admin/blank')->with('success','修改成功');
        }else{
        	return back()->with('error','修改失败');
        }
    }

    /**
     * 执行删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //通过id查找要删除的单条数据
        $res = Blank::find($id)->delete();
        if($res){
        //提交事务
        	return redirect('/admin/blank')->with('success','删除成功');
        }else{
        	return back()->with('error','删除失败');
        }
    }
}
