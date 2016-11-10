@foreach($comments as $comment)
<div class="panel panel-default">
	<div class="panel-body">
		<div class="media">
			<div class="media-left media-top">
				<a href="#">
					<img class="media-object img-circle img-rounded" 
						src="{{ gravatar($comment->user->email) }}" 
						alt="avatar">
				</a>
			</div>
			<div class="media-body">
				<h4 class="media-heading">
					<strong>{{ $comment->user->username }}</strong> - {{ $comment->created_at->diffForHumans() }}
				</h4>
				<br>
				{!! convertToHtml($comment->body) !!}
			</div>
		</div>
	</div>
	<div class="panel-footer">

		{{-- like / dislike button --}}
		@include('topics._like-button', [
			'action' => "/liked/comments/$comment->id",
			'type' => $comment
		])

	</div>
</div>
@endforeach

{{ $comments->links() }}