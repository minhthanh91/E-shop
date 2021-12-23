@extends('master')
@section('content')
<?php            
  use App\Http\Controllers\productController;
?>
<div class="container myorders my-4">
  <div class="row align-items-center">
    <div class="col-sm-10">
      <h4 class="heading">My Orders</h4>
      @foreach ($orders as $i=>$order)
        <h5 class="mt-5">Order at: {{$order->created_at}}</h5>
        @php
          $order_items=json_decode($order->cart_items);    
          $payment_detail = json_decode($order->payment_detail);
        @endphp
        @foreach ($order_items as $order_item)
          <?php            
            $priceDisplay = productController::displayPrice($order_item->price);      
          ?>
          <div class="row item border-top border-muted w-100">
            <div class="col-sm-3">
              <img src="{{$order_item->gallery}}" alt="" width="100px" height="100px">
            </div>          
            <div class="col-sm-9">
              <h6>{{$order_item->name}}</h6>
              <h6>{{$priceDisplay}} đ</h6>
              <div class="small">{{$order_item->description}}</div>
              <a href="/products/{{$order_item->id}}" class="small">Products Details</a>
            </div>          
          </div>
        @endforeach
        <?php
          $displayAmount = productController::displayPrice($payment_detail->amount);
          $displayTax = productController::displayPrice($payment_detail->tax);
          $displayDeliv = productController::displayPrice($payment_detail->delivery);
          $displayFinalPrice = productController::displayPrice($payment_detail->finalPrice);
        ?>
        <div class="row item border-top border-muted w-100">
          <div class="col-sm-12">
            <div class="w-100 space-between">
              <h6>Amount: </h6><span>{{$displayAmount}} đ</span>
            </div>
            <div class="w-100 space-between">
              <h6>Tax: </h6><span>{{$displayTax}} đ</span>
            </div>
            <div class="w-100 space-between">
              <h6>Delivery: </h6><span>{{$displayDeliv}} đ</span>
            </div>
            <div class="w-100 space-between">
              <h6>Total: </h6><span>{{$displayFinalPrice}} đ</span>
            </div>
            <div class="w-100 space-between">
              <h6>Payment method: </h6><span>{{$payment_detail->payMethod}}</span>
            </div>
            <div class="w-100 space-between">
              <h6>Status: </h6><span class="font-weight-bold text-warning">{{$order->status}}</span>
            </div>
          </div>          
        </div>
      @endforeach
    </div>    
  </div>
</div>
@endsection