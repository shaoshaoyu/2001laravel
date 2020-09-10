<?php

namespace App\Http\Middleware;

use Closure;

class Zuoye
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
        $user=$request->session()->get('user');
        if(!$user){
            return redirect("zuoye/login");
        }
        return $next($request);
    }
}
