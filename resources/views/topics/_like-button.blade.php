<form method="POST" action="{{ $action }}">
	{{ csrf_field() }}

	<button 
		class="btn btn-{{ Auth::check() && $type->isLiked() ? 'info' : 'default' }}">

		{{ $type->likes()->count() > 0 ? $type->likes()->count() : '' }}

		<span class="fa fa-thumbs-o-up"></span>
	</button>
</form>