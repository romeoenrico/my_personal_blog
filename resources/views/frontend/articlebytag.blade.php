@extends('frontend.master.layout')

@section('title') Tag @endsection

@section('subheading') Developer, Photographer @endsection

@section('content')

 	 <section class="main-slider">
        <ul class="bxslider">
            <li><div class="slider-item"><img src="images/1140x500-2.jpg" title="Funky roots" /><h2><a href="post.html" title="Vintage-Inspired Finds for Your Home">Vintage-Inspired Finds for Your Home</a></h2></div></li>
            <li><div class="slider-item"><img src="images/1140x500-1.jpg" title="Funky roots" /><h2><a href="post.html" title="Vintage-Inspired Finds for Your Home">Vintage-Inspired Finds for Your Home</a></h2></div></li>
            <li><div class="slider-item"><img src="images/1140x500-3.jpg" title="Funky roots" /><h2><a href="post.html" title="Vintage-Inspired Finds for Your Home">Vintage-Inspired Finds for Your Home</a></h2></div></li>
        </ul>
    </section>

    @foreach($articles as $article)

        @include('frontend.includes.articles_list_item', ['article' => $article])

    @endforeach

    {!! $articles->render() !!}

@endsection
