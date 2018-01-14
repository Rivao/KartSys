@extends('layouts.app')

@section('content')

	<div class = "container text-center">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">
		       	 	<div class="panel-heading">View Go-Kart</div>
		        		<div class="panel-body ">

							<p class="col-s-1 bg-info">{{ $kart->kart_nr }}</p>
							<p class="col-xs-3 bg-info">{{ $kart->model }}</p>
							<p class="col-xs-1 bg-info">{{ $kart->usable }}</p>
							<p class="col-xs-1 bg-info">{{ $kart->on_track }}</p>
							<p class="col-xs-1 bg-info">{{ $kart->broken }}</p>
							<p class="col-xs-2 bg-info">{{ $kart->created_at }}</p>
							<p class="col-xs-2 bg-info">{{ $kart->updated_at }}</p>

					</div>
				</div>
			</div>
		</div>
	</div>


@endsection