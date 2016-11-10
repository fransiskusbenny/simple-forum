@if(Auth::check())

	<form method="POST" action="/comments/{{ $topic->slug }}">
		{{ csrf_field() }}

		<div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
			<label class="control-label">Reply to this topic</label>
			<textarea name="comment" id="comment" 
				rows="15" required="required">{{ old('comment') }} </textarea>

		{!! $errors->first('comment','<span class="help-block">'. $errors->first('comment'). '</span>') !!}

		</div>

		<div class="form-group">
			<button type="submit" 
				class="btn btn-primary btn-lg">Post your reply</button>
		</div>

	</form>

@else 
	<div class="text-center lead">Please <a href="/login">sign in</a> to reply this topic.</div>
@endif