@extends('layouts.app')

@section('content')

	<table class = "table table-bordered table-striped table-dark">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Kart number</th>
				<th scope="col">Kart model</th>
				<th scope="col">Usable</th>
				<th scope="col">On Track</th>
				<th scope="col">Broken</th>
				<th scope="col">Added</th>
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

			</tr>
			@endforeach
		</tbody>
	</table>


@endsection