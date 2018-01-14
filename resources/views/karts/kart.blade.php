@extends('layouts.app')

@section('content')

	<div class = "container text-center">
		<div class="row">

			<p class="col-xs-4">{{ $kart->kart_nr }}</p>
			<p class="col-xs-4">{{ $kart->model }}</p>
			<p class="col-xs-4">{{ $kart->usable }}</p>
			<p class="col-xs-4">{{ $kart->on_track }}</p>
			<p class="col-xs-4">{{ $kart->broken }}</p>
			<p class="col-xs-4">{{ $kart->created_at }}</p>
			<p class="col-xs-4">{{ $kart->updated_at }}</p>

		</div>
	</div>


@endsection