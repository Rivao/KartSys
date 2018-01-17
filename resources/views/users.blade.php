
@extends('layouts.navAdmin')

@section('content')

	<div class = "container text-center">
		<table id="myTable" class = "table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th class="text-center">Username</th>
						<th class="text-center">First name</th>
						<th class="text-center">Last name</th>
						<th class="text-center">E-mail</th>
						<th class="text-center">Group</th>
						<th class="text-center">Created</th>
						<th class="text-center">View</th>
						<th class="text-center">Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $users as $user)
					
						<tr>
						<td>{{ $user->user_name }}</td>
						<td>{{ $user->first_name }}</td>
						<td>{{ $user->last_name }}</td>
						<td>{{ $user->email }}</td>
						@if($user->group == 1)
						<td>Manager</td>
						@elseif($user->group == 2)
						<td>Technical</td>
						@else
						<td>Administrator;</td>
						@endif
						<td>{{ $user->created_at }}</td>
						<td><a href='{{ route('edit-users', $user->id) }}'>Edit</a></td>
						<td>{{ Form::open(array('route' => array('delete-users', $user->id), 'method' => 'delete')) }}
						<!-- <td><a href='>Delete</a></td> -->
						{{ Form::submit('Delete') }}</td>
						{{ Form::close() }}
						</tr>

					@endforeach
				</tbody>
			</table>
	</div>


@endsection