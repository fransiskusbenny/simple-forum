@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-social.css">
@stop

@section('content')

<div class="col-md-4 col-md-offset-4" >
	<h3>Sign in to  Forum</h3>
	<div class="panel panel-default">
		<div class="panel-body">
		{{-- login form --}}
			<form method="POST" action="login">
				{{ csrf_field() }}

				<div class="form-group">
					<input type="text" name="login"
						class="form-control input-lg" 
						placeholder="Username or Email" required 
						value="{{ old('login') }}">
				</div>

				<div class="form-group">
					<input type="password" name="password" 
					class="form-control input-lg" 
					placeholder="Password" 
					required>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-block btn-lg btn-primary">Sign in</button>
				</div>
			</form>

			<p class="text-center">
				or
			</p>


			<a href="/redirect" class="btn btn-facebook btn-social btn-block btn-lg">
			 	<span class="fa fa-facebook"></span>
				Sign in with Facebook
			</a>
			
		</div>

	
	</panel>
</div>

@stop