<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>E-comm project</title>
  <!-- font-awesome js -->
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
  />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="{{ asset('./bootstrap/bootstrap.min.css') }}">
</head>
<body>
  {{View::make('header')}}
  @yield('content')
  {{View::make('footer')}}
  
  <!-- js -->
  <script src="{{ asset('./bootstrap/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('./bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('./js/main.js') }}"></script>
</body>

<style>
  .navbar-brand{
    letter-spacing: 0.2rem;
  }
  .custom-products,
    .custom-login{
    min-height: 400px;
  }
  .footer-icons{
    gap: 1rem;
  }
  .carousel-item img{
    object-fit: cover;
  }
  .carousel-caption {
    background-color: rgb(114 135 158 / 50%);    
  }
  .carousel-control-prev-icon,
  .carousel-control-next-icon  {
    padding: 1rem;
    background-color: rgb(0 123 255 / 50%);
  }
  .notification,
  .order,
  .cart-list,
  .myorders,
  .custom-product{    
    min-height: 600px;
  }
  .trending-product a{
    position: relative;
  }
  .trending-product form{
    position: absolute;
    top: 42%;
    left: 45%;
  }
  .custom-product img {
    object-fit: cover;
  }
  .cart-list .row.item img{
    object-fit: cover;    
  }  
  .myorders .space-between{
    border-bottom: 2px dotted rgba(47, 79, 79, 0.2);
    display: flex;
    justify-content: space-between;
  }
  .myorders .heading{
    letter-spacing: 0.2rem;
    color: darkkhaki;
  }  

  .vcenter{
    display: grid;
    align-content: center;
  }
  .hcenter{
    display: grid;
    justify-content: center;
  }
</style>
</html>