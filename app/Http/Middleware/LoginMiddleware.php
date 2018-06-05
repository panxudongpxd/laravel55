<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       // dd(session('status'));
            // 检测是否登录
            if(session('status')==null){
                // 跳转到登录页面
                return redirect('/admin/login'); //重定向
            }else{
                 return $next($request);//执行下一次请求
            }
    }
}
