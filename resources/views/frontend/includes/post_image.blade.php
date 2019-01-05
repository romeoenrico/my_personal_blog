<div class="blog-post-image" id="blog-post-image">
  <a href="{{url('articolo/' . $article->slug) }}">
      <img  src={{ asset('uploads/images') . "/" . $article->post_image }} alt="">
  </a>
</div>
