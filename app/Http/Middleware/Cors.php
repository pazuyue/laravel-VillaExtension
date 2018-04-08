<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        // 设置允许访问的域地址
        header('Access-Control-Allow-Origin:*');//允许所有来源访问
        header("Access-Control-Allow-Methods:GET, POST, PATCH, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers:Origin, Content-Type, X-Auth-Token");
        return $next($request);
    }
}
