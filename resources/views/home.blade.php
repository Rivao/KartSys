
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
                    @lang('main.Hello')
                </div>

                <div class="panel-body" style="font-size: 20px; width: 800px;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($group == 1) @lang('main.TextMen') 
                    @elseif ($group == 2) @lang('main.TextTehn') 
                    @else @lang('main.TexAdmin') 
                    @endif
                    
                </div>

                @if($group == 1)

                {{ Form::open(array('route' => array('register'), 'method' => 'get')) }}
                            {{ Form::submit(Lang::get('main.RegisterUsers'), array('class' => 'btn-block btn-primary')) }}
                            {{ Form::close() }}
                {{ Form::open(array('route' => array('view-users'), 'method' => 'get')) }}
                            {{ Form::submit(Lang::get('main.ViewUsers'), array('class' => 'btn-block btn-primary')) }}
                            {{ Form::close() }}
                @endif

            </div>
        </div>
    </div>
</div>

@endsection