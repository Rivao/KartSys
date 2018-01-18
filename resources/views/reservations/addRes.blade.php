@extends('layouts.navAdmin')

@section('content')

<div class = "container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
		        <div class="panel-heading">

		        	@if($edit) @lang('main.EditRes') 
		        	@else @lang('main.AddRes') 
		        	@endif

		        </div>
		        	<div class="panel-body">

		        		@if($edit) {{ Form::open(array('route' => array('resPost', $reservation->id)), ['class' => "form-horizontal"]) }}
		        		@else {{ Form::open(array('url' => 'reservations'), ['class' => "form-horizontal"]) }}
						@endif

						{{ csrf_field() }}

		        		<div class="col-md-8 form-group col-md-offset-2" style="font-size: 20px;"> @lang('main.ResInfoCust') </div>

		        		<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('first_name', Lang::get('main.firstName')) }}
							{{ Form::text('first_name',$edit ? $reservation->first_name : '', ['class' => 'col-md-4 form-control']) }}

							@if ($errors->get('first_name'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('first_name') }}</li>
        							</ul>
    							</div>
							@endif

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('last_name', Lang::get('main.lastName')) }}
							{{ Form::text('last_name', $edit ? $reservation->last_name : '', ['class' => 'col-md-4 form-control']) }}

							@if ($errors->get('last_name'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('last_name') }}</li>
        							</ul>
    							</div>
							@endif

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('number', Lang::get('main.Number')) }}
							{{ Form::text('number', $edit ? $reservation->number : '', ['class' => 'col-md-4 form-control']) }}

							@if ($errors->get('number'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('number') }}</li>
        							</ul>
    							</div>
							@endif

						</div>

						<div class="col-md-8 form-group col-md-offset-2" style="font-size: 20px;"> @lang('main.ResInfo') </div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('date', Lang::get('main.Date')) }}
							{{ Form::date('date',$edit ? $reservation->date : \Carbon\Carbon::now(), ['class' => 'col-md-4 form-control']) }}

							@if ($errors->get('date'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('date') }}</li>
        							</ul>
    							</div>
							@endif
							@if(session('resExists'))
    							<p class="text-danger">{{ session('resExists') }}</p>
							@endif

						</div>

						<div class="col-md-8 form-group col-md-offset-2" style="float: left; width: 50%;">
							{{ Form::label('hours', Lang::get('main.Hours')) }}
							{{ Form::selectRange('hours', 10, 20, $edit ? $reservation->hours : 10) }}

							{{ Form::label('minutes', Lang::get('main.Minutes')) }}
							{{ Form::selectRange('minutes',0, 59, $edit ? $reservation->minutes : 0) }}

						</div>


						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('length', Lang::get('main.Length')) }}

							{{ Form::select('length', array('10' => 10, '15' => 15, '20' => 20, '25' => 25, '30' => 30, '40' => 40, '50' => 50, '60' => 60), $edit ? $reservation->length : '') }}

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('numberRiders', Lang::get('main.Riders')) }}
							{{ Form::number('numberRiders',$edit ? $reservation->numberRiders : '', ['class' => 'col-md-4 form-control']) }}

							@if ($errors->get('numberRiders'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('numberRiders') }}</li>
        							</ul>
    							</div>
							@endif

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::submit(Lang::get('main.Submit')) }}
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection