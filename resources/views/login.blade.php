@extends('master')
@section('content')

<div class="container custom-login">
  <div class="row">
    <div class="col-sm-6 mx-auto my-5">
      <form class="form-group" method="POST" action="">
        @csrf
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="email">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelpId" placeholder="password">
        <button type="submit" class="btn btn-primary mt-2">Login</button>
        <p class="small mt-3 text-muted">
          If you haven't got an account already, let's <a href="register" class="text-primary">register</a>.
        </p>
        
      </form>  
    </div>
  </div>
</div>
@endsection