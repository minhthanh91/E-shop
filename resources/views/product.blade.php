@extends('master')
@section('content')
<?php            
  use App\Http\Controllers\productController;
  $priceDisplay = productController::displayPrice($product['price']);      
?>
<div class="container custom-product my-4">
  <div class="row align-items-center">
    <div class="col-sm-6">
      <img src="{{$product['gallery']}}" width="400px" alt="pic">
    </div>
    <div class="col-sm-6">
      <a href="/">Go back</a>
      <br><br>
      <h3>{{$product['name']}}</h3>
      <h6>Price: {{$priceDisplay}} đ</h6>
      <br>
      <div>Detail: {{ $product['description'] }}</div>
      <div>Category: <span class="badge-pill badge-secondary font-italic">{{ $product['category'] }}</span></div>
      <form action="/add_to_cart" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{$product['id']}}">
        <br><br>     
        <button class="btn btn-primary" type="submit">Add to Cart</button>
      </form>
      <br><br>
      <a href="/cartlist" class="btn btn-success">Buy Now</a>
    </div>    
  </div>
</div>
@endsection