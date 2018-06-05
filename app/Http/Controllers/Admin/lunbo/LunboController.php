<?php

namespace App\Http\Controllers\Admin\lunbo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LunboController extends Controller
{
    public function index()
    {
        //从数据库将所有轮播图的地址查询出来(需要将集合类型结果转化成数组)
        $data=DB::table('bk_lunbo')->get()->toArray();
        //dd($data);
        //给模板分配数据
    	return view('admin/lunbo/index',['data'=>$data]);
    }
    public function create()
    {
    	return view('admin.lunbo.create');
    }
    public function store()
    {
    	dd(222);
    }
    /**
     * 处理文件上传
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function upload(Request $request)
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
            $dir_name='./uploads/admin/'.date('Ymd',time()).'/';
            DB::beginTransaction();  //开启事务处理
            //将临时文件移动到真实路径中
            $res=$file->move($dir_name,$name);
            //处理路径
            $url=ltrim($dir_name.$name,'.');
            //dd($url);
            //将图片地址存入数据库
            $res2=DB::table('bk_lunbo')->insert(['url'=>$url]);
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
    public function delete($id)
    {
        $res=DB::table('bk_lunbo')->where('id',$id)->delete();
        if($res>0){
            return redirect('admin/lunbo')->with('success','删除成功！');
        }
        else
        {
            return back()->with('error','删除失败！');
        }
    }
}
