<?php
  use App\Http\Controllers\productController;
  use Illuminate\Support\Facades\Session;

  $totalItems=0;
  if (Session::has('user')) {
    $totalItems=productController::getCart();
  }
?>

<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #0a5287;">
  <a class="navbar-brand font-weight-bold" href="#">E-Shop</a>
  <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
      aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavId">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="/products">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/myorders">All Orders</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 mr-3" method="GET" action="/search">
      <input class="form-control mr-sm-2" type="text" name="userInput" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="mr-3">
      <a href="/cartlist" class="text-white">
        <i class="fas fa-shopping-cart text-success"></i> Cart({{$totalItems}})</a>
    </div>
    @if (Session::has('user'))
      <div class="dropdown">
        <a class="text-white dropdown-toggle" id="triggerId" data-toggle="dropdown">
          {{Session::get('user')['name']}}
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/logout">Log out</a>
        </div>
      </div>        
    @else
      <a class="text-white mr-3" href="/login">Login</a>
      <a class="text-white" href="/register">Register</a>
    @endif
      
  </div>
</nav>
