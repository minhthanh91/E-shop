<?php

namespace App\Http\Controllers;

use App\Http\Middleware\userAuth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
  public function logIn(Request $req)
  {
    $user = User::where('email', $req['email'])->first();
    
    if($user && Hash::check($req['password'], $user['password'])){
      $req->session()->put('user', $user);
      return redirect('/products');
    }
    else{
      return 'Email or password is wrong.';
    }
  }

  public function logOut()
  {
    Session::forget(['user']);
    return redirect('/products');
  }

  public function register(Request $req)
  {
    $add=new User();
    $add['name']=$req['name'];    
    $add['email']=$req['email'];
    $add['password']=Hash::make($req['password']);
    $add->save();
    return redirect('login');    
  }
}

