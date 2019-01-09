
<div class="col-md-6">
  <div class="blog-entry ftco-animate">
    <a href="{{ route('front.article', $article->slug) }}" class="blog-image">
      <img src=" {{ asset('uploads/images') . "/" . $article->post_image }} " class="img-fluid" alt="">
    </a>
    <div class="text py-4">

      @include('frontend.includes.post_title_and_meta')

      @if(str_word_count($article->body) > 50)
        <p>
          {!! \Illuminate\Support\Str::words($article->body, 50,'....')  !!}
        </p>
        <h7><a href="{{ route('front.article', $article->slug) }}">Read More</a></h7>
      @else
        <p>
          {!! $article->body !!}
        </p>
      @endif
    </div>
  </div>
</div>
