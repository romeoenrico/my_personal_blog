@extends('frontend.master.layout')

@section('title') Home Page @endsection

@section('subheading') Developer, Photographer @endsection

@section('content')

	<section class="ftco-fixed clearfix">
	      	<div class="image js-fullheight float-left">
	      		<div class="home-slider owl-carousel js-fullheight">
			        <div class="slider-item js-fullheight" style="background-image: url('{{ asset('images/bg_1.jpg') }}');">
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

								@include('frontend.includes.tags');

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
	                <h3 class="mb-5">6 Comments</h3>
	                <ul class="comment-list">
	                  <li class="comment">
	                    <div class="vcard bio">
	                      <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
	                    </div>
	                    <div class="comment-body">
	                      <h3>Jean Doe</h3>
	                      <div class="meta">June 27, 2018 at 2:21pm</div>
	                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                      <p><a href="#" class="reply">Reply</a></p>
	                    </div>
	                  </li>

	                  <li class="comment">
	                    <div class="vcard bio">
	                      <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
	                    </div>
	                    <div class="comment-body">
	                      <h3>Jean Doe</h3>
	                      <div class="meta">June 27, 2018 at 2:21pm</div>
	                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                      <p><a href="#" class="reply">Reply</a></p>
	                    </div>

	                    <ul class="children">
	                      <li class="comment">
	                        <div class="vcard bio">
	                          <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
	                        </div>
	                        <div class="comment-body">
	                          <h3>Jean Doe</h3>
	                          <div class="meta">June 27, 2018 at 2:21pm</div>
	                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                          <p><a href="#" class="reply">Reply</a></p>
	                        </div>


	                        <ul class="children">
	                          <li class="comment">
	                            <div class="vcard bio">
	                              <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
	                            </div>
	                            <div class="comment-body">
	                              <h3>Jean Doe</h3>
	                              <div class="meta">June 27, 2018 at 2:21pm</div>
	                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                              <p><a href="#" class="reply">Reply</a></p>
	                            </div>

	                              <ul class="children">
	                                <li class="comment">
	                                  <div class="vcard bio">
	                                    <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
	                                  </div>
	                                  <div class="comment-body">
	                                    <h3>Jean Doe</h3>
	                                    <div class="meta">June 27, 2018 at 2:21pm</div>
	                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                                    <p><a href="#" class="reply">Reply</a></p>
	                                  </div>
	                                </li>
	                              </ul>
	                          </li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </li>

	                  <li class="comment">
	                    <div class="vcard bio">
	                      <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
	                    </div>
	                    <div class="comment-body">
	                      <h3>Jean Doe</h3>
	                      <div class="meta">June 27, 2018 at 2:21pm</div>
	                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
	                      <p><a href="#" class="reply">Reply</a></p>
	                    </div>
	                  </li>
	                </ul>
	                <!-- END comment-list -->

	                <div class="comment-form-wrap pt-5">
	                  <h3 class="mb-5">Leave a comment</h3>
	                  <form action="#" class="bg-light p-4">
	                    <div class="form-group">
	                      <label for="name">Name *</label>
	                      <input type="text" class="form-control" id="name">
	                    </div>
	                    <div class="form-group">
	                      <label for="email">Email *</label>
	                      <input type="email" class="form-control" id="email">
	                    </div>
	                    <div class="form-group">
	                      <label for="website">Website</label>
	                      <input type="url" class="form-control" id="website">
	                    </div>

	                    <div class="form-group">
	                      <label for="message">Message</label>
	                      <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
	                    </div>
	                    <div class="form-group">
	                      <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
	                    </div>

	                  </form>
	                </div>
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
