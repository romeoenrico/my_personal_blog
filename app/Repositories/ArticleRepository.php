<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Article;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Exceptions\NotSavedException;
use App\Exceptions\NotFoundException;
use App\Exceptions\NotDeletedException;


class ArticleRepository
{


    public function findById($id)
    {
      $result = Article::with(['user', 'categories'])->find($id);
      if (!$result) {
          throw new NotFoundException();
    }
        return $result;
    }
    /**
     * Restituisce, paginati, gli articoli presenti sul database. Se $onlyPublished è true, solo quelli
     * mandati in pubblicazione. Se $onlyVisible è true, solo quelli già pubblicati e già visibili.
     *
     */

    public function getAll(Int $numberPerPage)
    {
         $query = Article::with('user', 'categories')->orderBy('published_at', 'DESC')
                  ->paginate($numberPerPage);
         return $query;
    }

    public function getArticlesByTags(Array $tags, Int $numberPerPage)
    {
   		 $query = Article::withAnyTag($tags)->orderBy('published_at', 'DESC')
                ->paginate($numberPerPage);
       return $query;
   	}

    public function save(Article $article)
    {
        if (!$article->save()) {
            throw new NotSavedException();
        }
    }

    /**
     * Cancella dal database l'articolo $article.
     *
     * @param Article $article
     * @throws NotDeletedException
     * @throws \Exception
     */
    public function delete(Article $article)
    {
        if (!$article->delete()) {
            throw new NotDeletedException();
        }
    }

    /**
      * Restituisce un articolo a partire dal suo slug.
      *
      * @param $slug
      * @return Model
      * @throws NotFoundException
      */
     public function findBySlug($slug)
     {
         $query = Article::with(['user', 'categories']);
         $query->where('published_at', '<=', Carbon::now());
         $query->where('is_published', '=', true);

         $result = $query->where('slug', '=', $slug)->first();
         if (!$result) {
             throw new NotFoundException();
         }
         return $result;
     }

     
}
