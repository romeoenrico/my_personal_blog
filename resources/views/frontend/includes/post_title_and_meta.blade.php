
<h2 class="post-title">
    <a href="{{ url('articolo/' . $article->slug) }}">{{ $article->title  }}</a>
</h2>
<div class="post-meta">

    <span>
      <i class="fa fa-user"></i>by
        <a href="{{ url('autore/' . $article->user->slug)  }}">
           {{ $article->user->first_name . ' ' . $article->user->last_name }}
        </a>
    </span>/
    <span>
        <i class="fa fa-clock-o"></i>{{ date('d/m/Y H:i', strtotime($article->published_at)) }}
    </span>/
    <span>
      <i class="fa fa-comment-o"></i>
      <a href="{{ url('articolo/' . $article->slug) }}#disqus_thread">343</a>
    </span>/
    <span>
      <i class="fa fa-book"></i>
       <a class="eta">

       </a> to read <a class="words"></a> words
    </span>

 </div>
