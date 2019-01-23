@extends('frontend.master.layout')

@section('title')List of Posts @endsection

@section('metadescription') List of Posts by Category | Enrico Romeo | Web Developer @endsection

@section('metakeywords') articles, blog, technology, coding, programming, posts, enrico romeo, web developer, laravel, php, Developer @endsection

@section('content')


    <div class="page-container float-right">

      @foreach ($articles->chunk(4) as $chunk)
        <div class="row">
          @foreach ($chunk as $article)
              @include('frontend.includes.articles_list_item', ['article' => $article])
          @endforeach
        </div>
      @endforeach

      <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">

            {!! $articles->render() !!}

          </div>
        </div>
      </div>

    </div><!-- end: page-container-->



@endsection
