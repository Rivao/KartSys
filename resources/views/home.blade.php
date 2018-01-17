
@extends('layouts.navAdmin')

@section('content')

<div class="container" style=" width: 1500px; margin: auto;">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default" >

                <div class="image"> 
                    <img src="https://static1.wall-art.de/out/pictures/generated/product/2/780_780_80/Wandtattoo-Go-Kart-einzel.jpg" 
                    alt="Karting" style="width:270px; float: left;" >
                </div>

                <div class="panel-heading" style="width: 900px; font-size: 25px;">
                    Hello and welcome to the karting hall system!
                </div>

                <div class="panel-body" style="font-size: 20px; width: 800px;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($group == 1) As a manager, in this system You can add a new user, make and view reservations, add, view and edit kartings.
                    @elseif ($group == 2) As a technical worker, in this system You can view and edit kartings. 
                    @else As an administrator, in this system You can make and view reservations.
                    @endif
                    
                </div>
                @if($group == 1)
                <a style="color:white" href="{{ route('register') }}"><button class="btn-block btn-primary">Add new user to the system</button></a>
                <a style="color:white" href="{{ route('view-users') }}"><button class="btn-block btn-primary">main.ViewUsers</button></a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection