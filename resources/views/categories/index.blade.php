@extends('layouts.master')


@section('content')
<h1 class="text-center">@lang('category.index')</h1>
<hr>
<div class="col-md-7">
    <div class="list-group">

    {{-- categories list --}}
    @foreach($categories as $category)

		<div href="#" class="list-group-item">
		    <div class="row">

				<div class="col-md-10">
					<h4>{{ $category->name }}</h4>
					<span class="label label-info">{{ $category->slug }}</span>
					<p>@lang('category.totalTopic', ['total' => $category->topics->count()])</p>
				</div>

				<div class="col-md-2">
					<a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-default btn-sm">
						<i class="fa fa-edit"></i>
					</a>
					<a href="{{ route('category.destroy', [$category->id]) }}" class="btn btn-danger btn-sm">
						<i class="fa fa-trash"></i>
					</a>
				</div>
		    </div>
		</div>

	@endforeach

	{{ $categories->links() }}

    </div>
</div>

<div class="col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading">@lang('category.quickCreate')</div>
		<div class="panel-body">
			<form method="post" action="{{ route('category.store') }}">
				{{ csrf_field() }}
				{{ method_field('post') }}

				<div class="form-group">
					<label class="control-label">@lang('category.field.name')</label>
					<input type="text" name="name" class="form-control" value="{{ old('name') }}">
				</div>

				<div class="form-group">
					<label class="control-label">@lang('category.field.description')</label>
					<textarea name="description" class="form-control">
						{{ old('description') }}
					</textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">@lang('category.btn.save')</button>
				</div>

			</form>
		</div>
	</div>
@endsection
