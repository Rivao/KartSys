@extends('layouts.app')

@section('content')

	<div class = "container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">
		       	 	<div class="panel-heading">View Go-Kart</div>
		        		<div class="panel-body ">

							<p class="col-xs-12">Kart number: {{ $kart->kart_nr }}</p>
							<p class="col-xs-12">Model: {{ $kart->model }}</p>
							<p class="col-xs-4">{{ $usable }}</p>
							<p class="col-xs-4">{{ $on_track }}</p>
							<p class="col-xs-4">{{ $broken }}</p>
							<p class="col-xs-6">Created: {{ $kart->created_at }}</p>
							<p class="col-xs-6">Updated: {{ $kart->updated_at }}</p>



					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">
		       	 	<div class="panel-heading">Comments</div>
		        		<div class="panel-body ">

		        			@foreach($comments as $comment)

		        			
		        			<p class="col-xs-12">{{ $comment->comment }}</p>

		        			@endforeach

		        			{{ Form::open(array('route' => array('add_comment', $kart->id)), ['class' => "form-horizontal"])}}
		        			<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::textarea('comment',null, ['class' => 'col-md-4 form-control', 'size' => '30x5']) }}
							@if ($errors->get('comment'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('comment') }}</li>
        							</ul>
    							</div>
							@endif
						</div>
						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::submit('Add comment') }}
						</div>

		        	</div>
				</div>
			</div>
		</div>

	</div>


@endsection