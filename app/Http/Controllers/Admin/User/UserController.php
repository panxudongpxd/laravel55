<?php

namespace App\Http\Controllers\Admin\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userinfo;
use DB;
class UserController extends Controller
{
    /**
     * 显示列表
     * @param  Request $request [description]
     * @return [type]           [description]
     */
   	public function index(Request $request)
   	{

   		$count=$request->input('count',5);
      $search_title=$request->input('account','');
      $params=$request->all();
      $data=User::where('account','like','%'.$search_title.'%')->paginate($count);
   		return view('admin.user.user',['data'=>$data,'params'=>$params]);
   	}

    /**
     * 添加用户页面
     * @return [type] [description]
     */
   	public function create()
   	{
   		return view('admin.user.create');
   	}

   	public function store(Request $request)
   	{
        //自动验证
        $this->validate($request,[
          'account'=>'required|regex:/^[a-zA-Z]{1}[\w]{4,11}$/',
          'password'=>'required|regex:/[\w]{5,}/',
          'password2'=>'required|same:password',
          'name'=>'required',
          'email'=>'required',
          'sex'=>'required',
          'phone'=>'required|regex:/^1[3-9]{1}[\d]{9}$/',
          'qq'=>'required|regex:/^[\d]{5,10}$/',
          ],[
            'account.required'=>'账号必填',
            'password.required'=>'密码必填',
            'password2.required'=>'确认密码必填',
            'name.required'=>'姓名必填',
            'email.required'=>'邮箱必填',
            'sex.required'=>'性别必填',
            'phone.required'=>'手机号必填',
            'qq.required'=>'QQ必填',
            'phone.regex'=>'手机格式不正确',
            'password2.same'=>'两次密码不一致',
            'password.regex'=>'请输入至少5位密码',
            'account.regex'=>'用户名格式不正确',
            'qq.regex'=>'qq格式不正确',
          ]);

        DB::beginTransaction();
   		  if($request -> hasFile('tou'))
        {
            // 创建文件上传对象
            $tou = $request -> file('tou');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $tou ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;
            $dir_name = './static/admin/user/img/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            //dd($name);
            $tou -> move($dir_name,$temp_name);
            $user = new User;
            
            $data=[
                'account'=>$request->input('account',''),
                'password'=>$request->input('password',''),
                'name'=>$request->input('name'),
            ];
            $uid=$user->insertGetId($data);
            $userinfo=new Userinfo;
            $userinfo->uid=$uid;
            $userinfo->email=$request->input('email','');
            $userinfo->sex=$request->input('sex','');
            $userinfo->phone=$request->input('phone','');
            $userinfo->qq=$request->input('qq','');
            $userinfo -> tou =trim($name,'.');
            $res2=$userinfo->save(); 
            if($uid&&$res2)
            {
               DB::commit();
              return redirect('/admin/user')->with('success','添加成功');
            }
            else
            {
              DB::rollBack();
              return back()->with('error','添加失败');
            }
            
       }
   	}

    /**
     * [show description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
   	public function show($id)
   	{
   		  $data = User::find($id);
        $userinfo = $data -> userinfo;
   		  return view('admin.user.show',['data'=>$data,'userinfo'=>$userinfo]);
   	}

   	public function edit($id)
   	{	
   		  $data = User::find($id);
        $userinfo = $data -> userinfo;
   		  return view('admin.user.edit',['data'=>$data,'userinfo'=>$userinfo]);
   	}

    /**
     * 删除列表
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
   	public function update(Request $request,$id)
   	{
      //自动验证
      $this->validate($request,[
          'account'=>'required|regex:/^[a-zA-Z]{1}[\w]{4,11}$/',
          'password'=>'required|regex:/[\w]{5,}/',
          'password2'=>'required|same:password',
          'name'=>'required',
          'email'=>'required',
          'sex'=>'required',
          'phone'=>'required|regex:/^1[3-9]{1}[\d]{9}$/',
          'qq'=>'required|regex:/^[\d]{5,10}$/',
          ],[
            'account.required'=>'账号必填',
            'password.required'=>'密码必填',
            'password2.required'=>'确认密码必填',
            'name.required'=>'姓名必填',
            'email.required'=>'邮箱必填',
            'sex.required'=>'性别必填',
            'phone.required'=>'手机号必填',
            'qq.required'=>'QQ必填',
            'phone.regex'=>'手机格式不正确',
            'password2.same'=>'两次密码不一致',
            'password.regex'=>'请输入至少5位密码',
            'account.regex'=>'用户名格式不正确',
            'qq.regex'=>'qq格式不正确',
          ]);
      $data = User::find($id);
      //dd($request->email);
      //dd($data->userinfo->email);
      $data->account=$request->account;
      $data->password=$request->password;
      $data->name=$request->name;
      $data->save();
      $data->userinfo->email=$request->email;
      $data->userinfo->sex=$request->sex;
      $data->userinfo->phone=$request->phone; 
      $data->userinfo->qq=$request->qq;
      $data ->userinfo->save();
      //dd($data->userinfo->tou);
     		if($request -> hasFile('tou')){
            // 创建文件上传对象
            $tou = $request -> file('tou');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $tou ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;
            $dir_name = './static/admin/tou/img/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            //echo $name;
            $tou -> move($dir_name,$temp_name);
            $data = User::find($id);
            $data->userinfo->tou=trim($name,'.');
            $data->userinfo->save();
           return redirect('/admin/user')->with('success','修改成功',['data'=>$data]);
       }
       return redirect('/admin/user')->with('success','修改成功');
   	}
   	public function destroy($id)
    {
        DB::beginTransaction();
        $user = User::find($id);
        $res = $user->delete();
        $res2 = $user->userinfo->delete();
        if ($res && $res2) {
            DB::commit();
            return redirect('/admin/user')->with('success','删除成功');
        } else {
           DB::rollBack();
           return back()->with('error','删除失败');
        }
    }
}
