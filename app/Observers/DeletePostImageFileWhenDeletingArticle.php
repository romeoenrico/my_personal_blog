<?php
namespace App\Observers;

use App\Article;
/**
 * Data un Articolo che sta per essere cancellata, viene cancellato l'immagine del post
 *
 * Class DeleteImagePostFileWhenDeletingArticle
 */
class DeletePostImageFileWhenDeletingArticle
{
    public function deleting(Article $article)
    {

      $fileName = public_path('/uploads/images' . "/" . $article->post_image);

      \File::delete($fileName);


    }
}
