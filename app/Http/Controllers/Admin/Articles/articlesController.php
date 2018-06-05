<?php

namespace App\Http\Controllers\Admin\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Articles\Articles;
use App\Models\Content\Content;
use App\Models\Admin\Cate;
use App\Models\Taginfo;
use DB;
class articlesController extends Controller
{
    /**
     * 显示文章列表页面
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
        $count=$request->input('count',5);
        $search_title=$request->input('title','');
        $params=$request->all();
        $data=articles::where('title','like','%'.$search_title.'%')->paginate($count);
    	return view('admin/articles/index',['data'=>$data,'params'=>$params]);
    }

    /**
     * 添加文章列表页面
     * @return [type] [description]
     */
    public function create()
    {
        $data=Cate::all();
        $da=Taginfo::all();
        
        // dd($da);
        // foreach ($data as $key => $value) {
        //    echo $value['cname'];
        // }
        //dd($data);
    	//加载模板
    	return view('admin/articles/articles',['data'=>$data,'da'=>$da]);
    }

    /**
     * 添加文章 操作
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        
        if($request -> hasFile('mytou'))
        {
            // 创建文件上传对象
            $mytou = $request -> file('mytou');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $mytou ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;
            $dir_name = './static/admin/articles/img/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            //dd($name);
            $mytou -> move($dir_name,$temp_name);
            $user = new articles;
            //将选中的标签是为数组转换为字符串放在数据库中
            $arr=$request->abc;
            $topicid=''; 
            foreach($arr as $key=>$vals){
                $topicid.=$vals.',';
                
            }
            $topicid = rtrim($topicid, ',');
            $a=$request->cname;
            $data=[
                'title'=>$request->input('title',''),
                'jianjie'=>$request->input('jianjie',''),
                'uid'=>$a,
                'tid'=>$topicid,
            ];
            $aid=$user->insertGetId($data);

            
            //dd($a);
            //$res3->uid=$a;

            $content=new content;
            $content->aid=$aid;
            $content->aname=session('loginName');
            $content->content=$request->input('content','');
            $content -> mytou =trim($name,'.');
            $res2=$content->save(); 
            if($aid&&$res2)
            {
               DB::commit();
              return redirect('/admin/articles')->with('success','添加成功');
            }
            else
            {
              DB::rollBack();
              return back()->with('error','添加失败');
            }    
       }
    }

    /**
     * 删除文章
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
        $user = articles::find($id);
        DB::beginTransaction();
        $user = articles::find($id);
        $res = $user->delete();
        $res2 = $user->content->delete();
        //判断操作删除这条文章是否为本人
        if($user->content->aname!=session('loginName')){
            return back()->with('error','这篇文章只有本人才能删除');
        }else if ($res && $res2) {
            DB::commit();
            return redirect('/admin/articles')->with('success','删除成功');
        }else {
           DB::rollBack();
           return back()->with('error','删除失败');
        }
    }

    public function details($id)
    {
        $data=Articles::where('id',$id)->first();
        return view('admin.details.details',['data'=>$data]);
    }
}
