
<div class="meta">
  <div>{{ date('d/m/Y H:i', strtotime($article->published_at)) }}</div>
  <div> {{ $article->user->first_name . ' ' . $article->user->last_name }}</div>
</div>
<h3 class="heading"><a href="{{ route('front.article', $article->slug) }}">{{ $article->title }}</a></h3>
