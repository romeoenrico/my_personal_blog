<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class SitemapController extends Controller
{

      public function index()
      {
                  // create new sitemap object
           $sitemap = \App::make("sitemap");

           // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
          	// by default cache is disabled
          	$sitemap->setCache('laravel.sitemap', 60);

           // add items to the sitemap (url, date, priority, freq)
           if (!$sitemap->isCached()) {
               $sitemap->add(\URL::to('/'), '2018-01-01T20:10:00+02:00', '1.0', 'daily');
               $sitemap->add(\URL::to('article'), '2018-01-01T12:30:00+02:00', '0.9', 'monthly');
               $sitemap->add(\URL::to('category'), '2018-01-01T12:30:00+02:00', '0.8', 'monthly');
               $sitemap->add(\URL::to('tag'), '2018-01-01T12:30:00+02:00', '0.7', 'monthly');
               // get all posts from db
               $posts = \DB::table('articles')->where('is_published', '=', true)->orderBy('created_at', 'desc')->get();
               $categories = \DB::table('categories')->orderBy('created_at', 'desc')->get();
               $tags = Article::existingTags();
               // add every post to the sitemap
               foreach ($posts as $post)
               {
                    $sitemap->add(\URL::to('article').'/'.$post->slug, $post->updated_at);
               }
               foreach ($categories as $category)
               {
                    $sitemap->add(\URL::to('category') . '/' . $category->slug, $category->updated_at);
               }
               foreach ($tags as $tag) {
                    $sitemap->add(\URL::to('tag') . '/' . $tag->slug);
               }
           }
           return $sitemap->render('xml');

      }

}
