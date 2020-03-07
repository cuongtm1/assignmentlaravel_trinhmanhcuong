<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckRoleAdmin
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
    // gọi lại check đăng nhập ở đây
    // rồi ms check role?
    if(Auth::check()){
        if(Auth::User()->role !== config('common.role.admin')){
            abort(403);
        }else{
            return $next($request);
        }
    }else{
        return redirect('login');
    }
    }












}
