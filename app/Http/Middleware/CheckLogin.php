<?php

namespace App\Http\Middleware;

use Closure;
use Input;
use DB;
use Redirect;

class CheckLogin
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
        if(!$request->session()->get('id_user')) {
            return redirect('/');
        }
        return $next($request);
    }
}
