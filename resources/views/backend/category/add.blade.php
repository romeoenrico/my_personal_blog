@extends('backend.master.layout')

@section('title') Aggiunta Categoria @endsection

@section('breadcrumb') Categorie > Aggiunta @endsection

@section('content')

@include('layouts.successmessage')

    <p>Usa il form di seguito per aggiungere una nuova categoria.</p>


     <form method="POST" action="{{ url('backend/addcategory') }}">


          {{csrf_field()}}


          <div class="form-group">
            <label for="name">Nome:</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nome" required>
          </div>

          <div class="form-group">
            <label for="description">Descrizione:</label>
            <textarea rows="10" id="description" class="form-control" name="description"  value="{{ old('description') }}" placeholder="Descrizione">

            </textarea>
          </div>

        <hr/>


      <div class="form-group">
        <button type="submit" class="btn btn-success form-control">Aggiungi Categoria</button>
      </div>

        @include ('layouts.errors')

    </form>

@endsection