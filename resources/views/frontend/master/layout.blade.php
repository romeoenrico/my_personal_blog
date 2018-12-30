<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="il blog di Enrico Romeo">
        <meta name="author" content="Enrico Romeo">
        <link rel="icon" href="favicon.ico">
        <title>@yield('title') - Il Blog di Enrico</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/jquery.bxslider.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css" />
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    </head>
    <body>
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="#about">Lifestyle</a></li>
                        <li><a href="#contact">Travel</a></li>
                        <li><a href="#contact">Fashion</a></li>
                        <li><a href="about.html">About Me</a></li>
                        <li><a href="about.html">Contact</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-reddit"></i></a></li>
                    </ul>

                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">
        <header>

            <div class="site-heading">
                <h1 class="site-title" style="font-size: 4em; padding-top: 0.1em;">
                    <span style="color:#e74430;">#</span>enricoromeo
                    <h4>Web Developer</h4>
                </h1>
                <hr class="small">
            </div>

        </header>

        <section>
            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div>
                <div class="col-md-4 sidebar-gutter">
                    <aside>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">About Me</h3>
                        <div class="widget-container widget-about">
                            <a href="post.html"><img src="images/author.jpg" alt=""></a>
                            <h4>Enrico Romeo</h4>
                            <div class="author-title">Developer</div>
                            <p>While everyone’s eyes are glued to the runway, it’s hard to ignore that there are major fashion moments on the front row too.</p>
                        </div>
                    </div>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Featured Posts</h3>
                        <div class="widget-container">

                            @foreach($articles as $featuredpost)

                                <article class="widget-post">
                                    <div class="post-image">
                                        <a href="post.html"><img src="images/90x60-1.jpg" alt=""></a>
                                    </div>
                                    <div class="post-body">
                                        <h2><a href="{{ url('articolo/' . $featuredpost->slug) }}">{{ $featuredpost->title }}</a></h2>
                                        <div class="post-meta">
                                            <span><i class="fa fa-clock-o"></i> 2. august 2015</span> <span><a href="post.html"><i class="fa fa-comment-o"></i> 23</a></span>
                                        </div>
                                    </div>
                                </article>


                            @endforeach

                        </div>
                    </div>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Socials</h3>
                        <div class="widget-container">
                            <div class="widget-socials">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-reddit"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Categories</h3>
                        <div class="widget-container">
                            @foreach($categories as $category)
                                <ul>
                                    <li>
                                        <a href="{{ url('categoria/' . $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <!-- sidebar-widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Archives</h3>
                        <div class="widget-container">
                            @foreach ($archives as $stats)
                                <ul>
                                    <li>
                                        <a href="{{\Request::url()}}?month={{ $stats['month'] }}&year={{ $stats['year'] }} ">
                                          {{ $stats['month'] . ' ' . $stats['year'] . ' ' . '( ' . $stats['published'] . ' posts )' }}
                                        </a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    </aside>
                </div>
            </div>
        </section>
        </div><!-- /.container -->

        <footer class="footer">

            <div class="footer-socials">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-reddit"></i></a>
            </div>

            <div class="footer-bottom">
                <i class="fa fa-copyright"></i> Copyright 2018. All rights reserved.<br>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript
            ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.bxslider.js') }}"></script>
        <script src="{{ asset('js/mooz.scripts.min.js') }}"></script>
        <script src="{{ asset('js/readingTime.js') }}"></script>

        <script>

            $(function() {

                $('article').each(function() {

                    $(this).readingTime({
                        readingTimeTarget: $(this).find('.eta'),
                        wordCountTarget: $(this).find('.words'),
                        remotePath: $(this).attr('data-file'),
                        remoteTarget: $(this).attr('data-target')
                    });

                });

            });

        </script>
     <script id="dsq-count-scr" src="//enricoromeo.disqus.com/count.js" async></script>
    </body>
</html>
