@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		
		<div class="panel panel-default">

			{{-- show topic detail --}}
			@include('topics._detail')

			<div class="panel-footer">
						
				{{-- like/dislike button --}}
				@include('topics._like-button', [
					'action' => "/liked/topics/$topic->slug",
					'type' => $topic
				])
		
			</div>
		</div>

		{{-- comment list for this topic --}}
		@include('topics._comments-list')
		<hr>
		{{-- form comment --}}
		@include('topics._form-comment')
	</div>
@stop

@section('css')
	<link rel="stylesheet" href="/css/simplemde.css">
@stop

@section('js')
	<script src="/js/simplemde.js"></script>

	<script>
		var simplemde = new SimpleMDE({ 
			element: $("#comment")[0],
			spellChecker: false,
			status: false 
		});
	</script>
@stop