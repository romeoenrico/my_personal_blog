
<div class="meta">
  <div><a href="#">{{ date('d/m/Y H:i', strtotime($article->published_at)) }}</a></div>
  <div><a href="{{ route('front.author', $article->user->slug )}}">
          {{ $article->user->first_name . ' ' . $article->user->last_name }}
       </a>
  </div>
</div>
<h3 class="heading"><a href="{{ route('front.article', $article->slug) }}">{{ $article->title }}</a></h3>
