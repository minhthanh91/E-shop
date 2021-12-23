@extends('master')
@section('content')
@php
  use App\Http\Controllers\productController;
@endphp
<div class="container custom-products">
  <div class="row my-5">
    <div class="col-sm-10 mx-auto">
      <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselId" data-slide-to="0" class="active"></li>
          <li data-target="#carouselId" data-slide-to="1"></li>
          <li data-target="#carouselId" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          @foreach ($data as $record)
          <?php            
            $priceDisplay = productController::displayPrice($record['price']);

          ?>
          <div class="carousel-item {{$record['id']==2 ? 'active' : ''}}">
            <div class="row">              
              <div class="col-12 d-flex justify-content-center">
                <img src="{{$record['gallery']}}" width="500px" class="mx-auto">
                <div class="carousel-caption d-none d-sm-block">
                  <h5>{{$record['name']}}</h4>
                  <h5>{{$priceDisplay}} $</h4>
                  <h6>{{$record['description']}}</h6>            
                </div>
              </div>
            </div>
          </div>         
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselId" data-slide="prev">
          <span class="carousel-control-prev-icon rounded-circle"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" data-slide="next">
          <span class="carousel-control-next-icon rounded-circle" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>  
  </div>
  <div class="row my-5">
    <h3 class="col-12 my-4">Trending Products</h3>
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