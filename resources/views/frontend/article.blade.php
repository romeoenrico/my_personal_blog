@extends('frontend.master.layout')

@section('title') {{ $article->title  }} @endsection

@section('content')

	<article class="blog-post">
	    <div class="blog-post-image">
	        <a href="post.html"><img src="images/750x500-3.jpg" alt=""></a>
	    </div>
	    <div class="blog-post-body">
	        <h2 class="post-title">
	            <a href="{{ url('articolo/' . $article->slug) }}">{{ $article->title  }}</a>
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
	            	<a href="{{ url('articolo/' . $article->slug) }}#disqus_thread">343</a>
	            </span>/
	            <span>
	            	<i class="fa fa-book"></i>
	            	 <a class="eta">

	          		 </a> to read <a class="words"></a> words
	            </span>


	        </div>

	        {!! $article->body !!}

					@if (count($article->tags) >= 1)
					<div class="post-meta">
						<i class="fa fa-tag"></i>Tag
						<span>
							@foreach ($article->tags as $tag)
								<span><a href="{{ url('tag/' . $tag->name)  }}">{{$tag->count . " " . $tag->name }}</span> </a>
								@if(!$loop->last)
									/
								@endif
							@endforeach
						</span>
					</div>
					@endif

					<div id="disqus_thread"></div>

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

		<script>

			/**
			*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
			*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

			var disqus_config = function () {
			this.page.url ='{{ url('articolo/' . $article->slug) }}';  // Replace PAGE_URL with your page's canonical URL variable
			this.page.identifier = '{{ $article->slug }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
			};

			(function() { // DON'T EDIT BELOW THIS LINE
			var d = document, s = d.createElement('script');
			s.src = 'https://enricoromeo.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
			})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endsection
