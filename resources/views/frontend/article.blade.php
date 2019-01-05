@extends('frontend.master.layout')

@section('title') {{ $article->title  }} @endsection

@section('content')

	<article class="blog-post">

	    <div class="blog-post-body">

					@include('frontend.includes.list_categories')

					@include('frontend.includes.post_image')

					@include('frontend.includes.post_title_and_meta')

	        {!! $article->body !!}

					<br>

				  @include('frontend.includes.tags')

					<div id="disqus_thread"></div>

	    </div>

	</article>

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
