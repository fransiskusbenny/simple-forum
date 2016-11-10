<div class="panel-heading">
	<h3 class="panel-title">
		<strong>{{ $topic->title }}</strong>
	</h3>
	</div>
<div class="panel-body">
	<div class="media">
		<div class="media-left media-top">
			<a href="#">
				<img class="media-object img-circle img-rounded" 
					src="{{ gravatar($topic->creator->email) }}" 
					alt="avatar">
			</a>
		</div>
		<div class="media-body">
			<h4 class="media-heading">
				<strong>{{ $topic->creator->username }}</strong> - {{ $topic->created_at->diffForHumans() }}
			</h4>
			<br>
			{!! convertToHtml($topic->content) !!}
		</div>
	</div>
</div>