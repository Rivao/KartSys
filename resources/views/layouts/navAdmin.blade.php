@extends('layouts.app')

@section('navBar')

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Karting Hall</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Reservations</a></li>
      <li><a href="#">Karts</a></li>
    </ul>

  </div>
</nav>

@yield('content')

@endsection