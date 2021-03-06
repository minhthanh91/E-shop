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
      $reqPath=$req->path();
      $listToLogin=[
        'cartlist',
        'add_to_cart',
        'order',
        'confirm_order',
        'myorders'
      ];
      
      // redirect to login page if user havent logged-in.  
      $isTrue=in_array($reqPath,$listToLogin);
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
