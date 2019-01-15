@extends('backend.master.layout')

@section('title') Modifica Articolo @endsection

@section('breadcrumb') Articoli > Modifica @endsection

@section('content')
    <p>Usa il form di seguito per modificare l'articolo scelto.</p>

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


    <form enctype="multipart/form-data" action="" method="post">
        <p>
          <img src={{ asset('uploads/images') . "/" . $article->post_image }} style="width:150px; height:150px; float:left; border-radius:50%; margin-right: 25px; ">

          <h3>Immagine Post</h3>

          <label>Aggiorna Immagine Post</label>
          <input type="file" name="postimage">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
          <br><br><br><br>
          <hr>
       </p>

        <p>
            <label for="title">Titolo:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{$article->title}}" />
        </p>

        <p>
            <label for="description">Descrizione:</label>
            <textarea class="form-control" id="my-editor" name="body" id="body" cols="30" rows="10">{{$article->body}}</textarea>
        </p>

        <p>
            <label for="categories">Categorie:</label>
            <select class="form-control" name="categories[]" id="categories" multiple>
                @foreach($categories as $category)
                    <option id="category{{ $category->id }}" value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @endforeach
            </select>
        </p>

        <p>
          <label for="tags"> Tags: </label>
              <select class="form-control" name="tags[]" id="tags" multiple>
                    @foreach($tags as $tag)
                        <option id="tag"{{ $tag->name}} value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
                    @endforeach
              </select>
          <br>
          <br>
          <input id="new-tag" type="text" />
          <button type="button" id="btn-add-tag">Aggiungi Tag</button>
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
                    <input class="form-control" type="text" name="published_at" id="published_at" value="{{ date('d/m/Y H:i', strtotime($article->published_at)) }}" placeholder="gg/mm/aaaa oo:mm" />
                </p>
            </div>
        </div>

        <hr/>

        <div class="row">
            <div class="col-md-6">
                <p>
                    <label for="metakeys">Meta Keys:</label>
                    <input type="text" class="form-control" name="metakeys" id="metadkeys" value="{{ $article->meta_keys }}" />
                </p>
            </div>

            <div class="col-md-6">
                <p>
                    <label for="metadescription">Meta Description:</label>
                    <input type="text" class="form-control" name="metadescription" id="metadescription" value="{{ $article->meta_description }}" />
                </p>
            </div>
        </div>

        <hr/>

        <p><button class="btn btn-success form-control">Salva Modifiche</button></p>

    </form>

    <script src="{{ asset('js/backend/mytinymce.js') }}"></script>

    <script>

        $(document).ready(function(){
            $("#categories").select2();

            $('#is_published').val('{{ $article->is_published }}');
            $("#categories").val({{ $article->categories->pluck('id') }}).trigger('change');
        });

        $(document).ready(function() {
            $("#tags").select2({
              tags: true
            });

            $("#btn-add-tag").on("click", function(){
              var newTagVal = $("#new-tag").val();
              // Set the value, creating a new option if necessary
              if ($("#tags").find("option[value='" + newTagVal + "']").length) {
                $("#tags").val(newTagVal).trigger("change");
              } else {
                // Create the DOM option that is pre-selected by default
                var newTag = new Option(newTagVal, newTagVal, true, true);
                // Append it to the select
                $("#tags").append(newTag).trigger('change');
              }
            });
        });
    </script>


@endsection
