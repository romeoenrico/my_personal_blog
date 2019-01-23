@extends('frontend.master.layout')

@section('title') {{ $article->title }} @endsection

@section('metadescription') {{ $article->meta_description }} @endsection

@section('metakeywords') {{ $article->meta_keys }} @endsection

@section('content')

	<section class="ftco-fixed clearfix">
	      	<div class="image js-fullheight float-left">
	      		<div class="home-slider owl-carousel js-fullheight">
			        <div class="slider-item js-fullheight" style="background-image: url('{{ asset('uploads/images') . "/" . $article->post_image }}');">
							 <div class="overlay"></div>
			          <div class="container">
			            <div class="row slider-text align-items-end" data-scrollax-parent="true">
			              <div class="col-md-10 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
			              	<p class="breadcrumbs"><span><a href="{{ route('front.home') }} ">Back to Home</a></span></p>
			                <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ $article->title }}</h1>
			              </div>
			            </div>
			          </div>
			        </div>
			      </div>
	      	</div><!-- end:image -->

	      	<div class="page-container float-right">
	      		<div class="row">
	            <div class="col-md-12">
	              <h2 class="mb-3">{{ $article->title }}</h2>

	              <p>{!! $article->body  !!}</p>

								@include('frontend.includes.tags')

	              <div class="about-author d-flex pt-5">
	                <div class="bio align-self-md-center mr-4">
	                  <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder" class="img-fluid mb-4">
	                </div>
	                <div class="desc align-self-md-center">
	                  <h3>About The Author</h3>
	                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
	                </div>
	              </div>


	               <div class="pt-5 mt-5">

	                <ul class="comment-list">
	                   <div id="disqus_thread"></div>
	                </ul>
	              </div>
	            </div> <!-- .col-md-12 -->
	          </div>
	      	</div><!-- end: page-container-->
	      </section>

		<script>

			/**
			*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
			*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

			var disqus_config = function () {
			this.page.url ='{{ route('front.article', $article->slug ) }}';  // Replace PAGE_URL with your page's canonical URL variable
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
