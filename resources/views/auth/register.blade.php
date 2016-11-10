@extends('layouts.master')


@section('content')

<div class="col-md-4 col-md-offset-4">
	.<div class="panel panel-default">
		<div class="panel-body">
		{{-- registration form --}}
			<form method="POST" action="register">
				{{ csrf_field() }}

				<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
					<input type="text" name="username"
						class="form-control input-lg" 
						placeholder="Username"
						value="{{ old('username') }}">

					 {!! $errors->first('username','<span class="help-block">'. $errors->first('username'). '</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					<input type="text" name="name"
						class="form-control input-lg" 
						placeholder="Real name" 
						value="{{ old('name') }}">

					 {!! $errors->first('name','<span class="help-block">'. $errors->first('name'). '</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<input type="email" name="email"
						class="form-control input-lg" 
						placeholder="Email address"
						value="{{ old('email') }}">

					{!! $errors->first('email','<span class="help-block">'. $errors->first('email'). '</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<input type="password" name="password" 
					class="form-control input-lg" placeholder="Password">

					{!! $errors->first('password','<span class="help-block">'. $errors->first('password'). '</span>') !!}
				</div>

				<div class="form-group">
					<input type="password" name="password_confirmation"
						class="form-control input-lg" placeholder="Repeat password">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-block btn-lg btn-primary">Sign up</button>
				</div>
			</form>

		</div>


	</panel>
</div>

@stop