<?php

namespace App\Http\Controllers\Admin\Cate;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Cate;
use DB;
//use App\Http\Requests\CateInsertRequest;
class CatesController extends Controller
{
	/**
	 * 显示分类列表信息页
	 * @return [type] [description]
	 * @$params 将提交的所有限制条件分配给模板，解决url地址栏条件不能保持问题
	 */
    public function index(Request $request)
    {
    	$count=$request->input('count',5);  //获取每页显示数
    	$keywords=$request->input('keywords','');//获取要查询的关键字
    	$params=$request->all();  //获取所有限制参数
    	//实例化Cate模型对象
    	$cate=new Cate;
    	//查询数据
    	$data=$cate->where('cname','like',"%{$keywords}%")->select('id','cname','pid','path',DB::raw("concat(path,id) as paths"))->orderBy('paths')->paginate($count);
    	//dd($data);
    	//跳转到分类列表页面并分配数据
    	return view('admin.cate.index',['data'=>$data,'params'=>$params]);
    }
    /**
     *添加页面显示
     *@param $id 父类id
     */
    public function create()
    {
    	//显示添加页面
    	return view('admin.cate.create');
    }
    /**
     * 执行顶级类添加操作
     */
    public function store(Request $request)
    {
    	//验证表单提交
    	$validate=Validator::make($request->all(),[
    		'cname' => 'required|unique:bk_cates|max:255',
    		],[
    		'cname.required' => '分类名必填！',
        	'cname.unique'   => '类名已存在！',
    		]);
    	if ($validate->fails()) {
 			return back()
 			->withErrors($validate)
			->withInput();
 		}
    	//接收表单数据
    	$rec['cname']=$request->input('cname');
    	//拼接数据
    	$rec['path']='0,';
    	$rec['pid']=0;
    	//使用模型插入数据,返回结果为布尔值
    	$res=Cate::insert($rec);
    	if($res){
    		return redirect('admin/cate')->with('success','添加成功！');
    	}else{
    		return back()->with('error','添加失败！');
    	}
    }
    /**
     * [destroy description]
     * @param  $id 要删除的id
     * return   删除操作返回影响行数
     */
    public function destroy($id)
    {
        //先判断该类下边是否有子类如果有子类就不能执行删除操作
        $isHaveSon=Cate::where('pid',$id)->first();
        if($isHaveSon !=null){
            return back()->with('error','注意：此类下有子类无法执行删除操作！');
        }
    	//使用模型方法根据id删除
    	$res=Cate::destroy($id);
    	//判断返回结果
    	if($res>0){
    		return redirect('admin/cate')->with('success','删除成功！');
    	}else{
    		return back()->with('error','删除失败！');
    	}
    }
    /**
     * 显示添加子类页面并将部分父类信息传递给模板页面
     * @param  $id  查询依据：根据父类id
     * 
     */
    public function addson($id)
    {
    	$data=Cate::select('path','id','cname')->find($id);
    	//dd($data);
    	return view('Admin.Cate.addson',['data'=>$data]);
    }
    /**
     * [insert 执行插入操作]
     * @param  Request $request [请求对象]
     * @param  $pid     [父类id]
     * 
     */
    public function insert(Request $request,$pid)
    {
        $name=$request->cname;
        $rec=Cate::where('cname',$name)->first();
        if($rec->cname==$name)
        {
            return back()->with('error','类名已存在');
        }
        if($request->cname=='')
        {
            return back()->with('error','类名称不能为空');
        }
    	$rec=$request->input();  //接收表单数据
    	//拼接子类信息数据
    	$rec['path']=$rec['path'].$pid.',';
    	$rec['pid']=$pid;
    	//使用模型将数据放入数据库
    	$cate=new Cate;  //实例化模型对象
    	$res=$cate->insert($rec);//将一组数据插入数据表返回值为布尔型
    	//判断返回结果
    	if($res){
    		return redirect('admin/cate')->with('success','添加成功！');
    	}else{
    		return back()->with('error','添加失败！');
    	}
    }	
}
