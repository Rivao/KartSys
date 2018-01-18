@extends('layouts.navAdmin')


@section('content')
	
	<div class = "container text-center">
		<a href = '{{ route('reservAdd') }}'>
		<button class = 'btn-block btn-primary'>@lang('main.AddRes')</button>
		</a>
		<table id="myTable" class = "table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th class="text-center">@lang('main.firstName')</th>
					<th class="text-center">@lang('main.lastName')</th>
					<th class="text-center">@lang('main.Number')</th>
					<th class="text-center">@lang('main.Date')</th>
					<th class="text-center">@lang('main.Time')</th>
					<th class="text-center">@lang('main.Length')</th>
					<th class="text-center">@lang('main.Riders')</th>
					<th class="text-center">@lang('main.Created')</th>
					<th class="text-center">@lang('main.Employee')</th>
					<th class="text-center">@lang('main.Edit')</th>
					<th class="text-center">@lang('main.Delete')</th>
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
					<td>
						@foreach( $users as $user)

							@if($user->id == $reservation->employee_id) {{ $user->user_name }}
							@endif

						@endforeach
						
					</td>

					<td><a href='{{ route('resEdit', $reservation->id) }}' >@lang('main.Edit')</a></td>
					<td>
						{{ Form::open(array('route' => array('resDel', $reservation->id), 'method' => 'delete' ) ) }}
						{{ Form::submit(Lang::get('main.Delete')) }}
					</td>
					{{ Form::close() }}
						
					
				</tr>

				@endforeach
			</tbody>

		</table>
	</div>


@endsection