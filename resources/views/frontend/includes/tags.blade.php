@if (count($article->tags) >= 1)
<div class="post-meta">
  <span>
    @foreach ($article->tags as $tag)
      <span>  <i class="fa fa-tag"></i><a href="{{ url('tag/' . $tag->name)  }}">{{$tag->count . " " . $tag->name }}</span> </a>
      @if(!$loop->last)
        /
      @endif
    @endforeach
  </span>
</div>
@endif
