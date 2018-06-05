<?php

namespace App\Http\Controllers\Admin\link;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link\Link;

class LinkController extends Controller
{
    public function index(Request $request)
    {
    	//接受分页的条数
    	$count=$request->input('count',5);
    	$search_title=$request->input('title','');
    	$params=$request->all();//以数组的方式接受所有的参数
    	//加载视图
    	$data=Link::where('title','like','%'.$search_title.'%')->paginate($count);
    	return view('admin.link.index',['data'=>$data,'params'=>$params]);
    }
    public function create()
    {	
    	$title='添加页面';
    	return view('admin.link.link',['title'=>$title]);
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'title'=>'required',
    		'link'=>'required',
    		'logo'=>'required',
    		],[
    			'title.required'=>'名称必填',
    			'link.required'=>'路径必填',
    			'logo.required'=>'图标必填',
    		]);
        if($request -> hasFile('logo'))
        {
            // 创建文件上传对象
            $logo = $request -> file('logo');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $logo ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;
            $dir_name = './static/admin/logo/img/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            //dd($name);
            $logo -> move($dir_name,$temp_name);
        	$data = new Link;
        	$data -> title = $request->title;
        	$data -> logo =trim($name,'.');
        	$data -> link = $request->link;
        	$data -> save();
        	return redirect('/admin/link')->with('success','添加成功',['data'=>$data]);
       }
    }
    public function edit($id)
    {
    	$data=Link::where('id',$id)->first();
    	$title='修改列表';
    	return view('admin.link.edit',['data'=>$data,'title'=>$title]);
    	
    }
    public function update(Request $request, $id)
    {
    	$this->validate($request,[
    		'title'=>'required',
    		'link'=>'required',
    		],[
    			'title.required'=>'名称必填',
    			'link.required'=>'路径必填',
    		]);
    	$data = Link::find($id);
        $data -> title = $request->title;
        $data -> link = $request->link;
        $data -> save();  	
    	//判断如果头像选择上传了
       if($request -> hasFile('logo')){
            // 创建文件上传对象
            $logo = $request -> file('logo');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $logo ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;
            $dir_name = './static/admin/logo/img/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            //echo $name;
            $logo -> move($dir_name,$temp_name);
        	$data = Link::find($id);
       		$data -> logo =trim($name,'.');
        	$data -> save();
        	return redirect('/admin/link')->with('success','修改成功');
       }
       return redirect('/admin/link')->with('success','修改成功');


    }
    public function destroy($id)
    {
    	$data = Link::find($id);
        $res=$data -> delete();
        if($res)
        {
        	return redirect('/admin/link')->with('success','删除成功');
        }
        else
        {
        	return back()->with('error','删除失败');
        }
    	
    }
}
