@extends('layouts.navAdmin')

@section('content')

<div class = "container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
		        <div class="panel-heading">Add a new reservation</div>
		        	<div class="panel-body">


		        		<div class="Customer info"> Information about customer: </div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('name', 'Name:') }}
							{{ Form::text('name',null, ['class' => 'col-md-4 form-control']) }}
						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('sName', 'Surname:') }}
							{{ Form::text('sName', null, ['class' => 'col-md-4 form-control']) }}

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('number', 'Number: ') }}
							{{ Form::number('number', null, ['class' => 'col-md-4 form-control']) }}

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('date', 'Date: ') }}
							{{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'col-md-4 form-control']) }}

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('time', 'Time: ') }}
							{{ Form::text('time', '13:30', ['class' => 'col-md-4 form-control']) }}

						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('length', 'Length of ride (min): ') }}
							{{ Form::select('length', array('15' => '15', '20' => '20', '25' => '25', '30' => '30', '35' => '35'), ['class' => 'col-md-4 form-control']) }}

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