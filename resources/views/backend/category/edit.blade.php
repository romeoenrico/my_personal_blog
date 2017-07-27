@extends('backend.master.layout')

@section('title') Modifica Categoria @endsection

@section('breadcrumb') Categorie > Modifica @endsection

@section('content')
    <p>Usa il form di seguito per modificare la categoria.</p>

    @if(count($errors->all()) > 0)
        <div class="alert alert-danger" role="alert">
            <p><b>Attenzione!</b></p>
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif

    <form action="" method="post">

        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

        <p>
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" />
        </p>

        <p>
            <label for="description">Descrizione:</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Spiega che articoli ci saranno qui...">{{ $category->description }}</textarea>
        </p>

        <hr/>

        <p><button class="btn btn-success form-control">Salva Categoria</button></p>

    </form>

@endsection