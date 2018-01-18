@extends('layouts.navAdmin')


@section('content')
	
	<div class = "container text-center">


		@if (!$today)
			<a href = '{{ route('reservToday') }}'>
			<button class = 'btn-block btn-primary'>@lang('main.ResToday')</button>
			</a>
		@endif

		<a href = '{{ route('reservAdd') }}'>
		<button class = 'btn-block btn-primary'>@lang('main.AddRes')</button>
		</a>

		@if ($today) <div class="col-md-8 form-group col-md-offset-2" style="font-size: 20px; padding-top: 20px;"> @lang('main.Today') </div>
		@endif

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
				
				<?php $dummyToday = \Carbon\Carbon::today(); 
					$dummy = substr($dummyToday, 0, -9);
				?> 

				@if($today && $reservation->date == $dummy)

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
						{{ csrf_field() }}
						{{ Form::submit(Lang::get('main.Delete')) }}
					</td>
					{{ Form::close() }}
					
					@elseif(!$today)

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
						{{ csrf_field() }}
						{{ Form::submit(Lang::get('main.Delete')) }}
					</td>
					{{ Form::close() }}

					@endif	
					
				</tr>

				@endforeach
			</tbody>

		</table>
	</div>


@endsection