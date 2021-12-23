@extends('master')
@section('content')
@php
  use App\Http\Controllers\productController;
@endphp
<div class="container custom-products">  
  <div class="row my-5">
    <h3 class="col-12 my-4">Search Results:</h3>
    @foreach ($data as $record)
    <?php            
      $priceDisplay = productController::displayPrice($record['price']);      
    ?>
    <div class="col-sm-4 col-md-3 my-4">
      <div class="trending-product hcenter">        
        <a href="products/{{$record['id']}}" class="hcenter">
          <img src="{{$record['gallery']}}" width="150px" alt="pic" class="border border-success">
        </a>

        <form action="/add_to_cart" method="post" class="d-none">
          @csrf
          <input type="hidden" name="product_id" value="{{$record['id']}}">
          <button type="submit" class="btn btn-success">
            <i class="fas fa-shopping-cart"></i> Add
          </button>
        </form>

        <div class="details text-center">
          <h6 class="my-2">{{$record['name']}}</h6>
          <h6 class="my-2">{{$priceDisplay}} đ</h6>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection