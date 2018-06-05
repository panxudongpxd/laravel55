<?php

namespace App\Http\Controllers\Admin\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config\Config;
class ConfigController extends Controller
{
   /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$title = '配置列表';
    	$data = Config::all();
        return view('admin.config.config',['data'=>$data,'title'=>$title]);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$data = Config::find($id);
        return view('admin.config.edit',['data'=>$data]);
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	//通过id查找单条数据
        $config = Config::find($id);
    	$config -> copy = $request -> copy;
        $config -> bah = $request -> bah;
        //保存
        $config -> save();
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            // 创建文件上传对象
            $logo = $request -> file('logo');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $logo ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;
            $dir_name = './static/admin/config/img/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            //echo $name;
            $logo -> move($dir_name,$temp_name);
        	$data = Config::find($id);
       		$data -> logo =trim($name,'.');
        	$data -> save();
        	return redirect('/admin/config')->with('success','修改成功');
       }
    }

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}