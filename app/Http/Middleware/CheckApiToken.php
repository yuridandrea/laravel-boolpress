<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $auth_token = $request->header('Authorization');

        //token assente
        if(empty($auth_token)){
          return response()->json([
            'success' => false,
            'error' => 'api token missed'
          ]);
        }

        $api_token = substr($auth_token, 7);
        $user = User::where('api_token', $api_token)->first();

        //token errato
        if(!$user) {
          return response()->json([
            'success' => false,
            'error' => 'wrong api token'
          ]);
        }
        return $next($request);
    }
}
