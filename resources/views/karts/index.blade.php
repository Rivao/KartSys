@extends('layouts.navAdmin')


@section('content')
	
	<div class = "container text-center">
		<a href = '{{ route('kartAdd') }}'>
		<button class = 'btn-block btn-primary'>@lang('main.AddKart')</button>
		</a>
		<table id="myTable" class = "table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th class="text-center">@lang('main.KartNumber')</th>
					<th class="text-center">@lang('main.KartModel')</th>
					<th class="text-center">@lang('main.Usable')</th>
					<th class="text-center">@lang('main.OnTrack')</th>
					<th class="text-center">@lang('main.Broken')</th>
					<th class="text-center">@lang('main.Added')</th>
					<th class="text-center">@lang('main.View')</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $karts as $kart)
				
					<tr>
					<td>{{ $kart->kart_nr }}</td>
					<td>{{ $kart->model }}</td>
					@if($kart->usable != null)
					<td>&#10004;</td>
					@else
					<td>&#10006;</td>
					@endif
					@if($kart->on_track != null)
					<td>&#10004;</td>
					@else
					<td>&#10006;</td>
					@endif
					@if($kart->broken != null)
					<td>&#10004;</td>
					@else
					<td>&#10006;</td>
					@endif
					<td>{{ $kart->created_at }}</td>
					<td><a href='{{ route('kart', $kart->id) }}'>@lang('main.View')</a></td>
					</tr>

				@endforeach
			</tbody>
		</table>
	</div>


@endsection