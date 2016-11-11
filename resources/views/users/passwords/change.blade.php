@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-social.css">
@stop

@section('content')

<div class="col-md-6 col-md-offset-3" >
	<h3>@lang('user.changePassword')</h3>
	<div class="panel panel-default">
		<div class="panel-body">

			{{-- user password form --}}
			<form method="post" action="{{ route('user.password.update') }}">
				{{ csrf_field() }}
				{{ method_field('put') }}

				<div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
					<label class="control-label">@lang('user.field.currentPassword')</label>
					<input type="password" name="current_password" class="form-control") }}">
					<span class="help-block">{{ $errors->first('current_password') }}</span>
				</div>

				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<label class="control-label">@lang('user.field.password')</label>
					<input type="password" name="password" class="form-control") }}">
					<span class="help-block">{{ $errors->first('password') }}</span>
				</div>

				<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
					<label class="control-label">@lang('user.field.passwordConfirmation')</label>
					<input type="password" name="password_confirmation" class="form-control") }}">
					<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">@lang('user.btn.changePassword')</button>
				</div>

			</form>

		</div>


	</panel>
</div>

@endsection
