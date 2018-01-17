@extends('layouts.navAdmin')


@section('content')
	
	<div class = "container text-center">
		<a href = '{{ route('reservAdd') }}'>
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
					<th class="text-center">Added</th>
					<th class="text-center">Employee</th>
					<th class="text-center">Edit</th>
					<th class="text-center">Delete</th>
				</tr>
			</thead>
		
			<tbody>
				@foreach( $reservations as $reservation)
				
				<tr>
					<td>{{ $reservation->first_name }}</td>
					<td>{{ $reservation->last_name }}</td>
					<td>{{ $reservation->number }}</td>
					<td>{{ $reservation->date }}</td>

					<td>{{ $reservation->hours }} : 
						@if ($reservation->minutes < 10) 0{{ $reservation->minutes }}
						@else {{ $reservation->minutes }}
						@endif
					</td>

					<td>{{ $reservation->length }}</td>
					<td>{{ $reservation->numberRiders }}</td>

					<td>{{ $reservation->created_at }}</td>
					<td>{{ $reservation->employee_id }}</td>
					<td><a href='{{ route('resEdit', $reservation->id) }}'>Edit</a></td>
					<td><a >Delete</a></td>
					
				</tr>

				@endforeach
			</tbody>

		</table>
	</div>


@endsection