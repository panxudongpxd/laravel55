<?php

namespace App\Http\Controllers\Admin\Photo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photo\Photo;
use App\Models\Picture\Picture;
use  DB;
class PhotoController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Photo::all();
        return view('admin.photo.photo',['data'=>$data]);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data = Photo::all();
        return view('admin.photo.create',['data'=>$data]);
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//dd($request -> all());
    	if($request -> hasFile('logo')){
            // 创建文件上传对象
            $logo = $request -> file('logo');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $logo ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;
            $dir_name = './static/admin/photo/img/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            $logo -> move($dir_name,$temp_name);
            $data = new Photo;
            $data -> ptitle = $request ->input('ptitle','');
       		$data -> logo =trim($name,'.');
        	$data -> save();
        	//return redirect('/admin/photo')->with('success','修改成功');
        }
        if($data){
        	return redirect('/admin/photo')->with('success','添加成功');
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
    	$data=picture::where('uid',$id)->get();
        return view('admin.photo.show',['data'=>$data]);
    }

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$data = Photo::find($id);
        return view('admin.photo.edit',['data'=>$data]);
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
        $photo = Photo::find($id);
        $photo -> ptitle = $request -> ptitle;
        $photo -> save();
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            // 创建文件上传对象
            $logo = $request -> file('logo');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $logo ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;
            $dir_name = './static/admin/photo/img/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            //echo $name;
            $logo -> move($dir_name,$temp_name);
        	$data = Photo::find($id);
       		$data -> logo =trim($name,'.');
        	$data -> save();
        	return redirect('/admin/photo')->with('success','修改成功');
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
        $data = Picture::find($id)->delete();
        if($data){
        	return redirect('/admin/photo')->with('success','删除成功');
        }else{
        	return back()->with('error','删除失败');
        }
    }
    /**
     * 显示子图片添加页
     */
    public function picture($id)
    {
        return view('admin.photo.addson',['uid'=>$id]);
    }
    /**
     * 多图文件上传封装
     */
    public function upload(Request $request,$uid)
    {
        //判断是否有文件提交
        if($request->hasFile('file_data')){
            //创建文件对象
            $file=$request->file('file_data');
            //获取文件拓展名
            $extend_name=$file->extension();
            //给文件起名
            $name=str_random(20).'.'.$extend_name;
            //拼接存储路径
            $dir_name='./static/admin/photo/'.date('Ymd',time());
            DB::beginTransaction();  //开启事务处理
            //将临时文件移动到真实路径中
            $res=$file->move($dir_name,$name);
            //处理路径
            $url=ltrim($dir_name.'/'.$name,'.');
            //将图片地址存入数据库
            $res2=DB::table('bk_picture')->insert(['plogo'=>$url,'uid'=>$uid]);
            //判断是否移动成功
            if($res && $res2){
                DB::commit();
                $arr=[
                    'code'=>1,
                    'msg' =>'上传成功！',
                    'url' =>$url
                ];
                echo json_encode($arr);
            }else{
                DB::rollback();
                $arr=[
                    'code'=>0,
                    'msg' =>'上传失败！',
                    'url' =>$url
                    ];
                return json_encode($arr);
            }
        }else{
            $arr=[
                    'code'=>2,
                    'msg' =>'未检测到有文件上传！'
                ];
                return json_encode($arr);
        }
    }

    /**
     * 相册删除操作
     * 删除相册需要将该相册下所有的图片删除掉
    */
   public function delete($id)
   {
        DB::beginTransaction();
        $res1=Photo::where('id',$id)->delete();
        $res2=Picture::where('uid',$id)->delete();
        if($res1 && $res2){
            DB::commit();
            return redirect('/admin/photo')->with('success','删除成功');
        }else{
            DB::rollback();
            return back()->with('error','删除失败');
        }
   }
}
