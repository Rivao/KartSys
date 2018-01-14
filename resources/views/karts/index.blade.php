@extends('layouts.app')

@section('content')
	
	<div class = "container text-center">
		<table class = "table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th class="text-center">Kart number</th>
					<th class="text-center">Kart model</th>
					<th class="text-center">Usable</th>
					<th class="text-center">On Track</th>
					<th class="text-center">Broken</th>
					<th class="text-center">Added</th>
					<th class="text-center">View</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $karts as $kart)
				
					<tr>
					<td>{{ $kart->kart_nr }}</td>
					<td>{{ $kart->model }}</td>
					<td>{{ $kart->usable }}</td>
					<td>{{ $kart->on_track }}</td>
					<td>{{ $kart->broken }}</td>
					<td>{{ $kart->created_at }}</td>
					<td><a href='{{ route('kart', $kart->id) }}'>View</a></td>
					</tr>

				@endforeach
			</tbody>
		</table>
	</div>


@endsection