@extends('layouts.navAdmin')

@section('content')

<div class = "container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
		        <div class="panel-heading">Add a new reservation</div>
		        	<div class="panel-body">

		        		{{ Form::open(array('route' => array('add_reserv')), ['class' => "form-horizontal"]) }}

		        		<div class="col-md-8 form-group col-md-offset-2" style="font-size: 20px;">Information about the customer:</div>

		        		<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('first_name', 'First name:') }}
							{{ Form::text('first_name',null, ['class' => 'col-md-4 form-control']) }}

							@if ($errors->get('first_name'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('first_name') }}</li>
        							</ul>
    							</div>
							@endif

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('last_name', 'Last name:') }}
							{{ Form::text('last_name', null, ['class' => 'col-md-4 form-control']) }}

							@if ($errors->get('last_name'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('last_name') }}</li>
        							</ul>
    							</div>
							@endif

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('number', 'Mobile phone number: ') }}
							{{ Form::text('number', null, ['class' => 'col-md-4 form-control']) }}

							@if ($errors->get('number'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('number') }}</li>
        							</ul>
    							</div>
							@endif

						</div>

						<div class="col-md-8 form-group col-md-offset-2" style="font-size: 20px;">Reservation date and time:</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('date', 'Date: ') }}
							{{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'col-md-4 form-control']) }}

							@if ($errors->get('date'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('date') }}</li>
        							</ul>
    							</div>
							@endif

						</div>

						<div class="col-md-8 form-group col-md-offset-2" style="float: left; width: 50%;">
							{{ Form::label('hours', 'Hours: ') }}
							{{ Form::selectRange('hours', 10, 20) }}

							{{ Form::label('minutes', 'Minutes: ') }}
							{{ Form::selectRange('minutes', 0, 59) }}

						</div>


						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('length', 'Length of the ride (min): ') }}
							{{ Form::select('length', array('15' => '15', '20' => '20', '25' => '25', '30' => '30', '35' => '35', '40' => '40'), ['class' => 'col-md-4 form-control']) }}

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('numberRiders', 'Number of riders: ') }}
							{{ Form::number('numberRiders',null, ['class' => 'col-md-4 form-control']) }}

							@if ($errors->get('numberRiders'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('numberRiders') }}</li>
        							</ul>
    							</div>
							@endif

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::submit('Submit') }}
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection