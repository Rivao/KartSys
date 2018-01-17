@extends('layouts.app')

@section('navBar')

<nav class="navbar navbar-default" style="background-color: #C2C9F7; ">

  <div class="container-fluid" style="padding-left: 195px;">

    <div class="navbar-header">
      <a class="navbar-brand" href="http://kartsys.test"style="font-size: 30px; font-weight: bold;">Karting Hall</a>
    </div>

    <ul class="nav navbar-nav">
      <li><a href="http://kartsys.test" style="font-size: 20px;">@lang('main.Home')</a></li>
      <li><a href="/reservations" style="font-size: 20px;">Reservations</a></li> 
      <li><a href="/karts" style="font-size: 20px;">Karts</a></li>
    </ul>

  </div>
</nav>

@yield('content')

@endsection