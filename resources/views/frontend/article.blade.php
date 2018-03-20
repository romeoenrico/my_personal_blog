@extends('frontend.master.layout')

@section('title') {{ $article->title  }} @endsection

@section('content')

	<article class="blog-post">
	    <div class="blog-post-image">
	        <a href="post.html"><img src="images/750x500-3.jpg" alt=""></a>
	    </div>
	    <div class="blog-post-body">
	        <h2 class="post-title">
	            <a href="{{ url('articolo/' . $article->slug)  }}">{{ $article->title  }}</a>
	        </h2>
	        <div class="post-meta">

	            <span>
	            	<i class="fa fa-user"></i>by
	                <a href="{{ url('autore/' . $article->user->slug)  }}">
	                   {{ $article->user->first_name . ' ' . $article->user->last_name }}
	                </a>
	            </span>/
	            <span>
	                <i class="fa fa-clock-o"></i>{{ date('d/m/Y H:i', strtotime($article->published_at)) }}
	            </span>/
	            <span>
	            	<i class="fa fa-comment-o"></i>
	            	<a href="#">343</a>
	            </span>/
	            <span>
	            	<i class="fa fa-book"></i>
	            	 <a class="eta">

	          		 </a> to read <a class="words"></a> words
	            </span>


	        </div>

	        {!! $article->body !!}


	    </div>

	</article>
	    <script>

			$(function() {

				$('article').readingTime({
					readingTimeTarget: $(this).find('.eta'),
					wordCountTarget: $(this).find('.words'),
					success: function() {
						console.log('It worked!');
					},
					error: function(message) {
						console.log(message);
						$(this).find('.eta').remove();
					}
				});

			});

		</script>

@endsection
