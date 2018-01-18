@extends('layouts.navAdmin')

@section('jscript')
<script src="/js/tick.js"></script>
@endsection

@section('content')

<div class = "container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
		        <div class="panel-heading">Add a new Go-Kart</div>
		        	<div class="panel-body">

						@if($edit){{ Form::open(array('route' => array('kartPost', $kart->id), 'files' => true), ['class' => "form-horizontal"]) }}
						@else {{ Form::open(array('url' => 'karts', 'files' => true), ['class' => "form-horizontal"]) }}
						@endif
						{{ csrf_field() }}
						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('kart_nr', 'Kart number:') }}
							{{ Form::number('kart_nr',$edit ? $kart->kart_nr : '', ['class' => 'col-md-4 form-control']) }}
							@if ($errors->get('kart_nr'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('kart_nr') }}</li>
        							</ul>
    							</div>
							@endif
						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('model', 'Model name:') }}
							{{ Form::text('model', $edit ? $kart->model : '', ['class' => 'col-md-4 form-control']) }}

							@if ($errors->get('model'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('model') }}</li>
        							</ul>
    							</div>
							@endif
						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('usable', 'Usable: ') }}
							{{ Form::checkbox('usable', $edit ? ($kart->usable ? 1 : 0) : 0, $edit ? ($kart->usable ? true : false) : 0) }}

							@if ($errors->get('usable'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('usable') }}</li>
        							</ul>
    							</div>
							@endif
						</div>

						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('on_track', 'On track: ') }}
							{{ Form::checkbox('on_track', $edit ? ($kart->on_track ? 1 : 0) : 0, $edit ? ($kart->on_track ? true : false) : 0) }}

							@if ($errors->get('on_track'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('on_track') }}</li>
        							</ul>
    							</div>
							@endif
						</div>
						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::label('broken', 'Broken: ') }}
							{{ Form::checkbox('broken', $edit ? ($kart->broken ? 1 : 0) : 0, $edit ? ($kart->broken ? true : false) : 0) }}

							@if ($errors->get('broken'))
    							<div class="alert alert-danger">
        							<ul>          						
                						<li>{{ $errors->first('broken') }}</li>
        							</ul>
    							</div>
							@endif
						</div>
						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::file('image', null) }}
						</div>
						<div class="col-md-8 form-group col-md-offset-2">
							{{ Form::submit('Submit') }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection