@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-social.css">
@stop

@section('content')

<div class="col-md-6 col-md-offset-3" >
	<h3>@lang('category.edit', ['name' => $category->name])</h3>
	<div class="panel panel-default">
		<div class="panel-body">

			{{-- category form --}}
			<form method="post" action="{{ route('category.update', [$category->id]) }}">
				{{ csrf_field() }}
				{{ method_field('put') }}

				<div class="form-group">
					<label class="control-label">@lang('category.field.name')</label>
					<input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
				</div>

				<div class="form-group">
					<label class="control-label">@lang('category.field.description')</label>
					<textarea name="description" class="form-control">
						{{ old('description', $category->description) }}
					</textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">@lang('category.btn.save')</button>
				</div>

			</form>

		</div>


	</panel>
</div>

@endsection
