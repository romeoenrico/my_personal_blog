<article class="blog-post">

    <div class="blog-post-body">

        @include('frontend.includes.list_categories')

        @include('frontend.includes.post_image')

        @include('frontend.includes.post_title_and_meta')

        @if(str_word_count($article->body) > 150)

            {!! \Illuminate\Support\Str::words($article->body, 250,'....')  !!}
            <div class="read-more">
                <a href="{{ url('articolo/' . $article->slug)  }}">Continue Reading </a>
            </div>
            <br>
            @include('frontend.includes.tags')
        @else

          {!! $article->body !!}
          <br>
          @include('frontend.includes.tags')
        @endif
    </div>

</article>
