<?php

namespace App\Repositories;

use App\Category;
use Illuminate\Database\Eloquent\Collection;


class CategoryRepository
{
    /**
     * Restituisce un set di categorie a partire dai loro id.
     *
     * @param array $ids
     * @return mixed
     */
    public function getByIds(array $ids)
    {
        return Category::findMany($ids);
    }


}
