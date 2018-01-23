<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class ConfigMiddleware
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
        $res = DB::table('configs')->first();
        if($res[0]['status']){
            return view('errors.503');
        }else{
            return $next($request);
        }
        
    }
}
