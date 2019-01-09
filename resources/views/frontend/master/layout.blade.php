<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Enrico Romeo | Web Developer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/cssresources.css')}}"


  </head>
  <body>

    <nav id="colorlib-main-nav" role="navigation">
      <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
      <div class="js-fullheight colorlib-table">
        <div class="colorlib-table-cell js-fullheight">
          <div class="row d-flex justify-content-end">
            <div class="col-md-12 px-5">
              <ul class="mb-5">
                <li class="active"><a href="index.html"><span>Home</span></a></li>
                @if ($categories)
                  @foreach ($categories as $category)
                    <li><a href="{{ route('front.category', $category->slug) }} "><span>{{$category->name}}</span></a></li>
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="col px-5 copyright">
            	<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <br> | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div id="colorlib-page">
      <header>
      	<div class="container-fluid">
	        <div class="row no-gutters">
	          <div class="col-md-12">
	            <div class="colorlib-navbar-brand">
	              <a class="colorlib-logo" href="{{ route('front.home')}} ">Enrico Romeo</a>
	            </div>
	            <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
	          </div>
	        </div>
        </div>
      </header>

      <section class="ftco-fixed clearfix">
        <div class="image js-fullheight float-left">
          <div class="home-slider owl-carousel js-fullheight">
            @if ($trendingArticles)
                @foreach ($trendingArticles as $article)
                  <div class="slider-item js-fullheight" style="background-image: url('{{ asset('images/bg_1.jpg') }}');">
                    <div class="overlay"></div>
                    <div class="container">
                      <div class="row slider-text align-items-end" data-scrollax-parent="true">
                        <div class="col-md-10 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            @if($article->categories)
                              @foreach ($article->categories as $category)
                                  <p class="cat"><span>{{ $category->name }}</span></p>
                              @endforeach
                            @endif
                          <h1 class="mb-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{ $article->title }}</h1>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            @endif
          </div>
        </div>

      @yield('content')

      </section>

		  <!-- loader -->
		  <div id="ftco-loader" class="show fullscreen">
		  	<svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg>
		  </div>

  	</div>

  <script src="{{ asset('js/jsresources.js') }}"></script>


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('todeletejs/google-map.js') }}"></script>





  </body>
</html>
