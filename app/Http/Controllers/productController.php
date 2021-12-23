<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\cartitem;
use App\Models\order;
use Hamcrest\Type\IsString;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function PHPUnit\Framework\isEmpty;

class productController extends Controller
{  
  static function displayPrice($price)
  {    
    $priceDisplay='';
    
    $priceInString = (string)$price;
    $temp=$priceInString;
    $priceLeng = strlen($priceInString);

    if ($priceLeng%3) {
      $priceDisplay .= substr($priceInString, 0, $priceLeng%3);
      $temp = substr($priceInString, $priceLeng%3 );
    }
    while (strlen($temp)) {
      $priceDisplay .= '.'.substr($temp, 0, 3);
      $temp = substr($temp, 3);
    }
    if ($priceLeng%3==0) {
      $priceDisplay = substr($priceDisplay, 1);
    }
    return $priceDisplay;

  }

  public function getAllProducts()
  {
    $data=product::all();
    return view('products', ['data'=>$data]);    
  }

  public function getProduct($id)
  {
    $product=product::find($id);
    return view('product', ['product'=>$product]);    
  }

  public function addToCart(Request $req)
  {
    if ($req->session()->has('user')) {
      $item = new cartitem();
      $item['user_id']=$req->session()->get('user')['id'];
      $item['product_id']=$req['product_id'];
      $item->save();
      return redirect('/products');
    } else{
      return redirect('/login');
    }
  }

  static function getCart()
  {
    $userID = Session::get('user')['id'];
    return cartitem::where('user_id', $userID)->count();
  }

  public function showCart()
  {
    $userID=Session::get('user')['id'];

    $cartitems=DB::table('cartitems')
    ->join('products','cartitems.product_id','=','products.id')
    ->where('cartitems.user_id', $userID)
    ->select('products.*', 'cartitems.id as cartitem_id')
    ->get();

    // Controller::check($cartitems);

    if($cartitems->isEmpty()){
      return view('notification', ['msg'=> 'Your cart is empty.']);
    }
    return view('cartlist', ['cartitems'=>$cartitems]);
  }

  public function removeCartItem($id)
  {
    cartitem::find($id)->delete();
    return redirect('cartlist');
  }

  public function order()
  {
    $userID=Session::get('user')['id'];

    $cartitems=DB::table('cartitems')
    ->join('products','cartitems.product_id','=','products.id')
    ->where('cartitems.user_id', $userID)
    ->select('products.*', 'cartitems.id as cartitem_id')
    ->get();

    if($cartitems->isEmpty()){
      return view('notification', ['msg'=> 'Your cart is empty.']);
    }

    $amount=$cartitems->sum('price');
    return view('order', ['amount'=>$amount, 'cartitems'=>$cartitems]);
  }
  
  public function confirmOrder(Request $req)
  {
    $userID=Session::get('user')['id'];
    // $product_id= cartitem::where('user_id', $userID)->select('product_id')->get();
    $cart_items=DB::table('cartitems')
    ->join('products','cartitems.product_id','=','products.id')
    ->where('cartitems.user_id', $userID)
    ->select('products.*')
    ->get();

    $cart_items = json_encode($cart_items);    
    $payment_detail=[
      "amount"=>$req['amount'],
      "tax"=>$req['tax'],
      "delivery"=>$req['delivery'],
      "finalPrice"=>$req['finalPrice'],
      "payMethod"=>$req['payMethod']
    ];
    $payment_detail = json_encode($payment_detail) ;
    
    $add = new order();
    $add['user_id']=$userID;
    $add['address']=$req['address'];
    $add['status']='pending';
    $add['cart_items']=$cart_items;
    $add['payment_detail']=$payment_detail;
    $add->save();

    cartitem::where('user_id',$userID)->delete();
    return view('notification', ['msg'=> 'New order added.']);
  }

  public function myOrders()
  {
    $userID=Session::get('user')['id'];    
    $orders=DB::table('orders')
    ->where('orders.user_id', $userID)
    ->get();
    if($orders->isEmpty()){
      return view('notification', ['msg'=>'You haven\'t got any order.']);      
    }
    return view('myorders',['orders'=>$orders]);
  }

  public function search(Request $req)
  {
    global $reqInput;
    $reqInput = $req->input('userInput');

    $filteredData=product::all()->filter(function($singleProduct){
      if (str_contains(strtolower($singleProduct->name), $GLOBALS['reqInput']))
        return true;
    });

    return view('search', ['data'=>$filteredData]);    
  }

  public function viewTable($tb)
  {
    $data=DB::table($tb)->get();
    Controller::check($data);
  }  
  public function test()
  {        
    $array = ['products' => ['desk' => ['price' => 100]]];

    // $filtered = Arr::except($array, ['products.desk.price']);
    Arr::forget($array, ['products.desk']);


    // return $filtered;
    return $array;
  }
}
