<?php

namespace App\Http\Controllers\Admin\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class LoginController extends Controller
{
	/**
	 * 渲染模板 进入登录主页
	 * 
	 */
    public function index()
    {
    	return view('admin.login.login');
    }

    /**
     * 验证表单 添加session 进入后台首页
     * 
     * 
     */
    public function store(Request $request)
    {
    	//自动验证
    	$this->validate($request,[
    		'name'=>'required',
    		'password'=>'required',
            'captcha'=>'required'
    		],[
    			'name.required'=>'用户名必填',
    			'password.required'=>'密码必填',
                'captcha.required'=>'验证码不正确',
    		]);
 
    	//判断输入账号密码是否和数据库中配对
    	$data=User::where('name','=',$request->name)->where('password','=',$request->password)->first();
	    	if($data)
	    	{
	    		//登录成功
	    		//判断权限级别 0为管理员
	    		if($data->auth==0)
	    		{
                    $request->session()->put('id',$data->id);
	    			$request->session()->put('loginName',$data->name);
                    $request->session()->put('myfile',$data->myfile);
	    			$request->session()->put('status',true);
                    //dd(session('milkcaptcha'));
                    if(($request->captcha)==session('milkcaptcha'))
                    {
                        return redirect('/admin')->with('success','登录成功');
                    }
                    else
                    {
                        return back()->with('error','验证码不正确');
                    }
	    		
	    		}
	    		//权限不是管理员时
	    		else
	    		{
	    			return back()->with('error','您的权限不够,暂无法登录！');
	    		}
	    		
	    	}
	    	else
	    	{
	    		//登录失败
	    		return back()->with('error','用户名或密码错误');
	    	}
	    
    	
    }

    /**
     * 后台退出
     * 
     */
    public function create()
    {
    	session(['status'=>false]);
        return redirect('/admin/login'); //重定向
    }
}
