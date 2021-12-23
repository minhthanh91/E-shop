@extends('master')
@section('content')
<?php            
  use App\Http\Controllers\productController;
?>
<div class="container cart-list my-4">
  <div class="row align-items-center">
    <div class="col-sm-10">
      <h4>Cart detail</h4>
      <div class="row my-4">
        <a href="/order" class="btn btn-link btn-danger text-white py-1">Order Now</a>        
      </div>
      @foreach ($cartitems as $cartitem)
      <?php            
        $priceDisplay = productController::displayPrice($cartitem->price);      
      ?>
      <div class="row item border-top border-muted w-100">
        <div class="col-sm-3">
          <img src="{{$cartitem->gallery}}" alt="" width="100px" height="100px">
        </div>
        <div class="col-sm-4">
          <h5>{{$cartitem->name}}</h5>
            <h6>{{$priceDisplay}} đ</h6>
            <div>{{$cartitem->description}}</div>
            <a href="/products/{{$cartitem->id}}" class="small">Products Details</a>
          </div>
          <div class="col-sm-2 d-flex align-items-center">
            <a href="/cartlist/remove/{{$cartitem->cartitem_id}}" class="btn btn-link btn-warning text-white py-1">Remove</a>
          </div>
        </div>
        @endforeach
        <div class="row my-4 border-top border-muted">
          <a href="/order" class="btn btn-link btn-danger text-white py-1 my-4">Order Now</a>        
        </div>
    </div>    
  </div>
</div>
@endsection