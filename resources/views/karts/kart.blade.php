@extends('layouts.navAdmin')

@section('content')

	<div class = "container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">
		       	 	<div class="panel-heading">View Go-Kart</div>
		        		<div class="panel-body ">
					        
							<p class="col-xs-12">Kart number: {{ $kart->kart_nr }}</p>
							<p class="col-xs-12">Model: {{ $kart->model }}</p>
							@if($kart->image)
							<div class="col-xs-6 col-xs-offset-3">
		        				<img src="{{ asset('kart_images/'.$kart->image) }}" style="width:80%">
		        			</div>
		        			@endif
							<p class="col-xs-4">{{ $usable }}</p>
							<p class="col-xs-4">{{ $on_track }}</p>
							<p class="col-xs-4">{{ $broken }}</p>
							<p class="col-xs-6">Created: {{ $kart->created_at }}</p>
							<p class="col-xs-6">Updated: {{ $kart->updated_at }}</p>
							{{ Form::open(array('route' => array('kartEdit', $kart->id), 'method' => 'get')) }}
							{{ Form::submit('Edit', array('class' => 'btn-block btn-primary')) }}
							{{ Form::close() }}

							{{ Form::open(array('route' => array('kartDel', $kart->id), 'method' => 'delete')) }}
							{{ csrf_field() }}
							{{ Form::submit('Delete', array('class' => 'btn-block btn-primary')) }}
							{{ Form::close() }}


					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">
		       	 	<div class="panel-heading">Comments</div>
		        		<div class="panel-body ">

		        			<tbody>
			        			@foreach($comments as $comment)
			        			<div class=" col-xs-12 well">
				        			<p class="col-xs-7 bg-primary">Author: {{ $commentArr[$n]->first_name }} {{ $commentArr[$n++]->last_name}}</p>
				        			<p class="col-xs-5 bg-primary">Time: {{ $comment->created_at}}</p>
				        			<p class="col-xs-12 well">{{ $comment->comment }}</p>
			        			</div>
			        			@endforeach
		        			</tbody>

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