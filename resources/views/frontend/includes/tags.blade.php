@if (count($article->tags) >= 1)
  <div class="tag-widget post-tag-container mb-5 mt-5">
    <div class="tagcloud">
      @foreach ($article->tags as $tag)
          <a href="{{ route('front.tag', $tag->name) }}" class="tag-cloud-link">{{ $tag->name }}</a>
      @endforeach
    </div>
  </div>
@endif
