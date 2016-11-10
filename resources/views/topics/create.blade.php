@extends('layouts.master')

@section('content')
<h1 class="text-center">
	Add New Topic
</h1>

<div class="col-md-9 col-md-offset-3">	
	<form method="POST" action="{{ url('/topics/create') }}">
		{{ csrf_field() }}
	
		<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
			<label class="control-label" for="title">What's your topic title?</label>

			<input type="text" name="title"
				class="form-control"
				placeholder="e.g. How to upload image using AJAX?"
				value="{{ old('title') }}">

			{!! $errors->first('title','<span class="help-block">'. $errors->first('title'). '</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
			<label class="control-label" 
			for="content">What's the content?</label>

			<textarea name="content" id="content"
				class="form-control" 
				data-provide="markdown"
				rows="15">{{ old('content') }}</textarea>

			{!! $errors->first('content','<span class="help-block">'. $errors->first('content'). '</span>') !!}
		</div>

		<div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
			<label class="control-label" 
				for="content">What's category of your topic?</label>
			
			<select class="form-control" name="category">
				<option>Select category</option>

				@foreach($categories as $category)
					<option value="{{ $category->id }}"
					{{ old('category') == $category->id ? 'selected' : '' }}>
						{{ $category->name }}
					</option>
				@endforeach

			</select>

			 {!! $errors->first('category','<span class="help-block">'. $errors->first('category'). '</span>') !!}
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Submit topic</button>
		</div>

	</form>
</div>

@stop


@section('css')
	<link rel="stylesheet" href="/css/simplemde.css">
@stop

@section('js')
	<script src="/js/simplemde.js"></script>

	<script>
		var simplemde = new SimpleMDE({ 
			element: $("#content")[0],
			spellChecker: false,
			status: false 
		});
	</script>
@stop