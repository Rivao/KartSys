@extends('layouts.navAdmin')

@section('content')

	<div class = "container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">
		       	 	<div class="panel-heading"> @lang('main.ViewKart')</div>
		        		<div class="panel-body ">

							<p class="col-xs-12">@lang('main.KartNumber'): {{ $kart->kart_nr }}</p>
							<p class="col-xs-12">@lang('main.KartModel'): {{ $kart->model }}</p>
             			 	@if($kart->image)
							<div class="col-xs-6 col-xs-offset-3">
		        				<img src="{{ asset('kart_images/'.$kart->image) }}" style="width:80%">
				        	</div>
				        	@endif
							<p class="col-xs-4">@lang('main.Usable') {{  $usable }}</p>
							<p class="col-xs-4">@lang('main.OnTrack') {{  $on_track }}</p>
							<p class="col-xs-4">@lang('main.Broken') {{ $broken }}</p>
							<p class="col-xs-6">@lang('main.Created'): {{ $kart->created_at }}</p>
							<p class="col-xs-6">@lang('main.Updated'): {{ $kart->updated_at }}</p>
							<a href='{{ route('kartEdit', $kart->id) }}'>
							<button class="btn-primary btn-block" id="editBtn">@lang('main.Edit')</button>
							</a>
					       
							{{ Form::open(array('route' => array('kartDel', $kart->id), 'method' => 'delete')) }}
							{{ csrf_field() }}
							{{ Form::submit(Lang::get('main.Delete'), array('class' => 'btn-block btn-primary')) }}
							{{ Form::close() }}


					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
            	<div class="panel panel-default">
		       	 	<div class="panel-heading">@lang('main.Comment')</div>
		        		<div class="panel-body ">

		        			<tbody>
			        			@foreach($comments as $comment)
			        			<div class=" col-xs-12 well">
				        			<p class="col-xs-7 bg-primary">@lang('main.Author'): {{ $commentArr[$n]->first_name }} {{ $commentArr[$n++]->last_name}}</p>
				        			<p class="col-xs-5 bg-primary">@lang('main.Time'): {{ $comment->created_at}}</p>
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
							{{ Form::submit(Lang::get('main.AddComment')) }}
						</div>

		        	</div>
				</div>
			</div>
		</div>

	</div>


@endsection