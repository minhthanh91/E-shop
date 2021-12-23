@extends('master') 
@section('content')
<?php            
  use App\Http\Controllers\productController;
?>
<div class="container order my-4">
    <div class="row align-items-center">
        <div class="col-sm-10">
            <h4>Order detail</h4>
            <table class="w-100">
                <thead class="border-bottom border-muted">
                    <tr>
                        <th>All products</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartitems as $item)
                    <?php            
                      $priceDisplay = productController::displayPrice($item->price);      
                    ?>
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$priceDisplay}} đ</td>
                    </tr>
                    @endforeach
                </tbody>
                <?php
                  $tax = $amount*10/100;
                  $delivery = 50000;
                  $finalPrice = $amount+$tax+$delivery;

                  $displayAmount = productController::displayPrice($amount);
                  $displayTax = productController::displayPrice($tax);
                  $displayDeliv = productController::displayPrice($delivery);
                  $displayFinalPrice = productController::displayPrice($finalPrice);
                ?>
                <tfoot class="border-top border-muted">
                    <tr>
                        <th>Amount</th>
                        <th>{{ $displayAmount }} đ</th>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>{{$displayTax}} đ</td>
                    </tr>
                    <tr>
                        <td>Delivery</td>
                        <td>{{$displayDeliv}} đ</td>
                    </tr>
                    <tr class="border-top border-muted">
                        <th>Total</th>
                        <th>{{$displayFinalPrice}} đ</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <form action="/confirm_order" method="POST">
        @csrf
        <input type="hidden" name="amount" value="{{ $amount }}" />
        <input type="hidden" name="tax" value="{{ $tax }}" />
        <input type="hidden" name="delivery" value="{{ $delivery }}" />
        <input type="hidden" name="finalPrice" value="{{ $finalPrice }}" />
        <div class="row my-3">
            <div class="col-sm-10">
                <textarea
                    class="w-75"
                    name="address"
                    rows="2"
                    placeholder="Type your address"
                    required
                ></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <h6>Payment method:</h6>
            </div>
            <div class="col-sm-8">
                <input
                    type="radio"
                    name="payMethod"
                    value="online"
                    id="online"
                    class="mx-2"
                /><label for="online">Online payment</label>
                <input
                    type="radio"
                    name="payMethod"
                    value="EMI"
                    id="EMI"
                    class="mx-2"
                /><label for="EMI">EMI payment</label>
                <input
                    type="radio"
                    name="payMethod"
                    value="on Delivery"
                    id="onDelivery"
                    class="mx-2"
                    checked
                /><label for="onDelivery">on Delivery payment</label>
            </div>
        </div>
        <div class="row">
            <button class="btn btn-warning" type="submit">Confirm Order</button>
        </div>
    </form>
</div>
@endsection
