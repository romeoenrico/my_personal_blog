@extends('backend.master.layout')

@section('title') Aggiunta Articolo @endsection

@section('breadcrumb') Articoli > Aggiunta @endsection

@section('content')
    <p>Usa il form di seguito per aggiungere un nuovo articolo.</p>

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
            <label for="title">Titolo:</label>
            <input type="text" class="form-control" name="title" id="title" />
        </p>

        <p>
            <label for="description">Descrizione:</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
        </p>

        <p>
            <label for="categories">Categorie:</label>
            <select class="form-control" name="categories[]" id="categories" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="tags">Tags:</label>
            <select class="form-control" name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </p>

        <hr/>

        <div class="row">
            <div class="col-md-6">
                <p>
                    <label for="is_published">Stato:</label>
                    <select name="is_published" id="is_published" class="form-control">
                        <option value="0">Bozza</option>
                        <option value="1">Pubblicato</option>
                    </select>
                </p>
            </div>

            <div class="col-md-6">
                <p>
                    <label for="published_at">Data di Pubblicazione:</label>
                    <input class="form-control" type="text" name="published_at" id="published_at" value="{{ date('d/m/Y H:i') }}" placeholder="gg/mm/aaaa oo:mm" />
                </p>
            </div>
        </div>

        <hr/>

        <div class="row">
            <div class="col-md-6">
                <p>
                    <label for="metakeys">Meta Keys:</label>
                    <input type="text" class="form-control" name="metakeys" id="metadkeys" />
                </p>
            </div>

            <div class="col-md-6">
                <p>
                    <label for="metadescription">Meta Description:</label>
                    <input type="text" class="form-control" name="metadescription" id="metadescription" />
                </p>
            </div>
        </div>

        <hr/>

        <p><button class="btn btn-success form-control">Aggiungi Articolo</button></p>

    </form>

    <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

    <script>
        tinymce.init({
            selector:'textarea#body',
            plugins: [],
            toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });

        $(document).ready(function(){
            $("#categories").select2();
        });
    </script>

@endsection
