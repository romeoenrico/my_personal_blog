@extends('frontend.master.layout')

@section('title') Articoli di {{ $author->first_name . ' ' . $author->last_name }} @endsection

@section('subheading') Articoli di {{ $author->first_name . ' ' . $author->last_name }} @endsection

@section('content')

    @foreach($articles as $article)

        @include('frontend.includes.articles_list_item', ['article' => $article])

    @endforeach

    <div style="text-align: center;">
        {!! $articles->render() !!}
    </div>

@endsection