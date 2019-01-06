@extends('frontend.master.layout')

@section('title') Home Page @endsection

@section('subheading') Developer, Photographer @endsection

@section('content')

 	  @include('frontend.includes.main_slider')

    @foreach($articles as $article)

        @include('frontend.includes.articles_list_item', ['article' => $article])

    @endforeach

    {!! $articles->render() !!}

@endsection
