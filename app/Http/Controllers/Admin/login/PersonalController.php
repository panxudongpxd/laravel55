<?php

namespace App\Http\Controllers\Admin\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class PersonalController extends Controller
{
    public function show($id)
    {
    	//dd($id);
    	$data=User::where('id',$id)->first();
    	return view('admin.login.preson',['data'=>$data]);
    }
    public function store(Request $request)
    {
    	//自动验证
    	$this->validate($request,[
    		'name'=>'required|regex:/^[a-zA-Z]{1}[\w]{4,11}$/',
    		'email'=>'required|email',
    		'phone'=>'required|regex:/^1[3-9]{1}[\d]{9}$/',
    		],[
    			'name.required'=>'用户名必填',
    			'name.regex'=>'用户名格式不正确',
    			'email.required'=>'邮箱必填',
    			'email.email'=>'邮箱格式不正确',
    			'phone.required'=>'手机号必填',
    			'phone.regex'=>'手机格式不正确',
    		]);
    	
    	$id=$request->id;
    	$data=User::find($id);
        $data -> name = $request->name;
        $data -> sex = $request->sex;
        //$data -> password = $request->password;
        $data -> email = $request->email;
        $data -> phone = $request->phone;
        $data -> save();
    	
    	//判断如果头像选择上传了
       if($request -> hasFile('myfile')){
            // 创建文件上传对象
            $myfile = $request -> file('myfile');
            // 处理图片 路径和图片的名称
            // 获取后缀
            $ext = $myfile ->getClientOriginalExtension();
            $temp_name = time().rand(1000,9999).'.'.$ext;
            //echo $temp_name;
            $dir_name = './static/admin/login/img/'.date('Ymd',time());
            $name = $dir_name.'/'.$temp_name;//拼接路径便于存储
            //echo $name;
            $myfile -> move($dir_name,$temp_name);
        	$data = User::find($id);
       		$data -> myfile =trim($name,'.');
        	$data -> save();
        	return redirect('/admin/login')->with('success','修改成功');
       }
       return redirect('/admin/login')->with('success','修改成功');

    }
    public function edit($id)
    {
    	//dd($id);
    	$data=User::where('id',$id)->first();
    	return view('admin.login.pass',['data'=>$data]);
    }
    public function update(Request $request, $id)
    {
    	$data=User::find($id);
    	//dd($request->password2==$data->password);
        $this->validate($request,[
        	'password2'=>'required',
        	'password'=>'required|regex:/[\w]{5,}/',
    		'password3'=>'required|same:password',
    		],[
    			'password.required'=>'密码必填',
    			'password2.required'=>'旧密码必填',
    			'password3.required'=>'确认密码必填',
    			'password.regex'=>'请输入至少5位密码',
    			'password3.same'=>'两次密码不一致',
    		]);
        if($request->password2==$data->password)
        {
        	$data -> password = $request->password;
        	$data -> save();
        	//dd('aa');
        	return redirect('/admin/login')->with('success','修改成功');
        }
        else
        {
        	return back()->with('error','旧密码不正确');
        }
    }

}

