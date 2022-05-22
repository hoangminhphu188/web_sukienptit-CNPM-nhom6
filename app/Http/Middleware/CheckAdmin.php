<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) //ham kiem tra dang nhap admin
    {
        if ($request->session()->exists('admin')) { // kiem tra xem trong session da co admin hay chua 
            return $next($request);//neu co roi cho di tiep
        } else {
            return redirect()->route('admin.login')->withErrors('You must login first!');//neu chua cho quay ve trang login 
        }
    }
}
