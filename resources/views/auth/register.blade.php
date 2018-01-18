
@extends('layouts.navAdmin')

@section('auth')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">

                    @if($edit) @lang('main.EditUser')
                    @else @lang('main.RegisterUser')
                    @endif
                 
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                            <label for="user_name" class="col-md-4 control-label">@lang('main.Username')</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control" name="user_name" @if(!$edit) value="{{ old('user_name') }}" @else value="{{ $user->user_name }}" @endif required autofocus>

                                @if ($errors->has('user_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">@lang('main.firstName')</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" @if(!$edit) value="{{ old('first_name') }}" @else value="{{ $user->first_name }}" @endif required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">@lang('main.lastName')</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" @if(!$edit) value="{{ old('last_name') }}" @else value="{{ $user->last_name }}" @endif required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('groupd_id') ? ' has-error' : '' }}">
                            <label for="group_id" class="col-md-4 control-label">@lang('main.GroupId')</label>

                            <div class="col-md-6">
                                <input id="group_id" type="text" class="form-control" name="group_id" @if(!$edit) value="{{ old('group_id') }}" @else value="{{ $user->group_id }}" @endif required autofocus>

                                @if ($errors->has('group_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('groupd_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">@lang('main.Email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" @if(!$edit) value="{{ old('email') }}" @else value="{{ $user->email }}" @endif required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">@lang('main.Password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">@lang('main.ConfirmPassword')</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('main.Submit')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
