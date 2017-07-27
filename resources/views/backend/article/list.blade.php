@extends('backend.master.layout')

@section('title') Elenco Articoli @endsection

@section('breadcrumb') Articoli > Elenco @endsection

@section('content')
    <p>Di seguito, l'elenco degli articoli presenti attualmente.</p>

    <div class="text-center">
        {!! $articles->render() !!}
    </div>

    <table class="table table-striped">
        <thead>
            <td><b>Titolo</b></td>
            <td><b>Autore</b></td>
            <td><b>Categorie</b></td>
            <td><b>Data di Pubblicazione</b></td>
            <td><b>Stato</b></td>
            <td><b>Operazioni</b></td>
        </thead>

    @foreach($articles as $article)

        <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->user->first_name . ' ' . $article->user->last_name }}</td>
            <td>{{ $article->categories()->get()->implode('name', ', ') }}</td>
            <td>{{ date('d/m/Y - H:i', strtotime($article->published_at)) }}</td>
            <td>
            @if($article->is_published)
                Pubblicato
            @else
                Non Pubblicato
            @endif
            </td>
            <td>
                <a class="btn btn-info" href="{{ url('backend/editarticle/' . $article->id) }}">Modifica</a>
                <a class="btn btn-danger" href="{{ url('backend/indexarticle/delete/' . $article->id) }}" onclick="return confirm('Confermare la cancellazione dell\'articolo?')">Cancella</a>
            </td>
        </tr>

    @endforeach

    </table>

@endsection