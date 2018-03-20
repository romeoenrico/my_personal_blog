<?php

namespace App\Observers;

use App\Article;

/**
* Dato un articolo che sta per essere cancellato, si occupa di rimuovere le associazioni alle categorie relative.
*
* Class DetachCategoriesBeforeArticleDelete
*/
class DetachCategoriesBeforeArticleDelete
{
  public function deleting(Article $article)
  {
      $article->categories()->detach();
  }
}
