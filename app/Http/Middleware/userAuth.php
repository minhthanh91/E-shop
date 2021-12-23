<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class userAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $req, Closure $next)
    {
      global $reqPath;
      $reqPath=$req->path();

      // redirect to login page if user havent logged-in.
      $listToLogin=[
        'cartlist',
        'add_to_cart',
        'order',
        'confirm_order',
        'myorders'
      ];
      $isTrue=Arr::first($listToLogin, function($v){
        global $reqPath;
        if ($v==$reqPath) return true;
      });
      if ( $isTrue && !$req->session()->has('user')) {
        return redirect('login');        
      }
      
      // if user have logged-in.
      if (($reqPath=='register' || $reqPath=='login') && $req->session()->has('user')) {
        return redirect('products');
      }

      return $next($req);
    }
}
