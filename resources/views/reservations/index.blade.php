@extends('layouts.navAdmin')


@section('content')
	
	<div class = "container text-center">
		<a href = '{{ route('kartAdd') }}'>
		<button class = 'btn-block btn-primary'>Add new reservation</button>
		</a>
		<table id="myTable" class = "table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th class="text-center">First name</th>
					<th class="text-center">Last name</th>
					<th class="text-center">Mobile phone number</th>
					<th class="text-center">Date</th>
					<th class="text-center">Time</th>
					<th class="text-center">Length of the ride</th>
					<th class="text-center">Number of riders</th>
				</tr>
			</thead>
		
		</table>
	</div>


@endsection