<?php
namespace App\Observers;

use App\Category;
/**
 * Data una categoria che sta per essere cancellata, ne viene rimossa ogni associazione con gli articoli
 * ad essa correlati.
 *
 * Class DetachArticlesWhenDeletingCategory
 */
class DetachArticlesWhenDeletingCategory
{
    public function deleting(Category $category)
    {
        $category->articles()->detach();
    }
}
