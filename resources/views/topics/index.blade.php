@extends('layouts.master')


@section('content')
<h1 class="text-center">Forum Discussion</h1>
<hr>
<div class="col-md-7">
    <div class="list-group">

    {{-- topics list --}}
    @foreach($topics as $topic)

		<div href="#" class="list-group-item">
		    <div class="row">
		        <div class="col-md-2">
		        	<a href="#">
		        		<img class="list-group-item-text img-circle" 
		        			src="{{ gravatar($topic->creator->email, 75) }}">
		        	</a>
		        </div>

				<div class="col-md-10">
					<p>
						<strong>
							<a href="/topics/{{ $topic->slug}}/show">{{ $topic->title }}</a>
						</strong>
					</p>
					<p>
						Updated <span class="text-muted"> {{ $topic->updated_at->diffForHumans() }}</span>
						by <span class="text-muted"> {{ $topic->creator->username }}</span>
					</p>
					<a href="#">
						<span class="badge badge-default"><i class="fa fa-tag"></i> {{ $topic->category->name }}</span>
					</a> &emsp;
					<span>{{ $topic->comments()->count() }} <i class="fa fa-comments"></i></span>
					&emsp;
					<span>{{ $topic->likes()->count() }} <i class="fa fa-thumbs-up"></i></span>
				</div>
		    </div>
		</div>

	@endforeach
	
	{{ $topics->links() }}

    </div>
</div>
@stop