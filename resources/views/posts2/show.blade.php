@extends("layouts/posts2.master")

@section("content")

	 <div class="col-sm-8 blog-main">
		<h1>{{ $post->title }}</h1>

		{{ $post->body }}


	@if ($post->tags)
	<ul>
		@foreach ($post->tags as $tag)
		<li>
			<a href="/posts2/tags/{{ $tag->name }}">
			{{ $tag->name}}
			</a>
		</li>
		@endforeach
	</ul>
	@endif


		<hr>
		{{--show the comments--}}

		<div class="comments">
			<ul class="list-group">
				@foreach ($post->commentsfunction as $c)
					<li class="list-grouo-item">
						<strong>
							{{ $c->created_at->diffForHumans() }}: &nbsp;
				        </strong>

				             {{ $c->body }}
					</li>
				@endforeach
			</ul>
		</div>



		{{--add a comment--}}
		<hr>

		<div class="card">
			<div class="card-block">

				<form method="POST" action="/posts2/{{ $post->id }}/comments">


					{{ csrf_field() }}



					<div class="form-group">
						<textarea name="body" placeholder="Your comment here..." class="form-control"></textarea>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>

				</form>

				@include ("layouts.errors")
			</div>
		</div>

	 </div>


@endsection