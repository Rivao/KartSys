
@extends('layouts.navAdmin')

@section('content')

	<div class = "container text-center">
		<table id="myTable" class = "table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th class="text-center">@lang('main.Username')</th>
						<th class="text-center">@lang('main.firstName')</th>
						<th class="text-center">@lang('main.lastName')</th>
						<th class="text-center">@lang('main.Email')</th>
						<th class="text-center">@lang('main.Group')</th>
						<th class="text-center">@lang('main.Created')</th>
						<th class="text-center">@lang('main.View')</th>
						<th class="text-center">@lang('main.Delete')</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $users as $user)
					
						<tr>
						<td>{{ $user->user_name }}</td>
						<td>{{ $user->first_name }}</td>
						<td>{{ $user->last_name }}</td>
						<td>{{ $user->email }}</td>

						@if($user->group_id == 1)
							<td>@lang('main.Manager')</td>
						@elseif($user->group_id == 2)
							<td>@lang('main.Technical')</td>
						@else
							<td>@lang('main.Administrator')</td>
						@endif

						<td>{{ $user->created_at }}</td>
						<td><a href='{{ route('edit-users', $user->id) }}'>@lang('main.Edit')</a></td>
						<td>{{ Form::open(array('route' => array('delete-users', $user->id), 'method' => 'delete')) }}
						<!-- <td><a href='>Delete</a></td> -->
						{{ Form::submit(Lang::get('main.Delete')) }}</td>
						{{ Form::close() }}
						</tr>

					@endforeach
				</tbody>
			</table>
	</div>


@endsection