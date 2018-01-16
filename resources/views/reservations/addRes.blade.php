@extends('layouts.navAdmin')

@section('content')

<div class = "container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
		        <div class="panel-heading">Add a new reservation</div>
		        	<div class="panel-body">


		        		<div class="col-md-8 form-group col-md-offset-2" style="font-size: 20px;">Information about the customer:</div>

		        		<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('first_name', 'First name:') }}
							{{ Form::text('first_name',null, ['class' => 'col-md-4 form-control']) }}
						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('last_name', 'Last name:') }}
							{{ Form::text('last_name', null, ['class' => 'col-md-4 form-control']) }}

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('number', 'Mobile phone number: ') }}
							{{ Form::text('number', null, ['class' => 'col-md-4 form-control']) }}

						</div>


						<div class="col-md-8 form-group col-md-offset-2" style="font-size: 20px;">Reservation date and time:</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('date', 'Date: ') }}
							{{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'col-md-4 form-control']) }}

						</div>

						<div class="col-md-8 form-group col-md-offset-2" style="float: left; width: 50%;">
							{{ Form::label('hours', 'Hours: ') }}
							{{ Form::selectRange('hours', 8, 17) }}

							{{ Form::label('minutes', 'Minutes: ') }}
							{{ Form::selectRange('minutes', 0, 59) }}
						</div>


						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('length', 'Length of ride (min): ') }}
							{{ Form::select('length', array('15' => '15', '20' => '20', '25' => '25', '30' => '30', '35' => '35', '40' => '40'), ['class' => 'col-md-4 form-control']) }}

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('numberRiders', 'Number of riders: ') }}
							{{ Form::number('numberRiders',null, ['class' => 'col-md-4 form-control']) }}

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