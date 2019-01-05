@if (count($article->categories) >= 1)
<div class="post-meta">
  <span>
    @foreach ($article->categories as $category)
      <span><i class="fa fa-file-text" aria-hidden="true"></i><a href="{{ url('categoria/' . $category->name)  }}">{{ $category->name }}</span> </a>
      @if(!$loop->last)
        /
      @endif
    @endforeach
  </span>
</div>
@endif
