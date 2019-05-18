@extends('layouts.app')

@section('content')
  <div class="container">
	  <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto mb-5 border border-light rounded p-5">
            <h1>Trust.me</h1>
            <h2>Entrust something to someone, here!</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-4"></div>
          <div class="col-12 col-md-2">
              <a class="btn btn-block btn-lg btn-primary" href="{{ route('login') }}">Login!</a>
          </div>
          <div class="col-12 col-md-2">
              <a class="btn btn-block btn-lg btn-primary" href="{{ route('register') }}">Sign up!</a>
          </div>
          <div class="col-12 col-md-4"></div>
        </div>
      </div>
      </div>
    </header>
  </div>
	
@endsection
 