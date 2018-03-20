<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Article;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Exceptions\NotSavedException;


class ArticleRepository
{
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
}
