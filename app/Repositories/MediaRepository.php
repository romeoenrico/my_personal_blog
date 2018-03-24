<?php

namespace App\Repositories;

use App\Media;
use App\Exceptions\NotFoundException;
use App\Exceptions\NotSavedException;
use App\Exceptions\NotDeletedException;

class MediaRepository
{


    /**
     * Restituisce un media dato il suo id.
     *
     * @param $id
     * @return mixed
     * @throws NotFoundException
     */
    public function findById($id)
    {
        $media = Media::find($id);

        if (!$media) {
            throw new NotFoundException();
        }

        return $media;
    }

    /**
     * Salva un nuovo media $media su database.
     *
     * @param Media $media
     * @throws NotSavedException
     */
    public function save(Media $media)
    {
        if (!$media->save()) {
            throw new NotSavedException();
        }
    }

    /**
     * Cancella il media $media dal database.
     *
     * @param Media $media
     * @throws NotDeletedException
     * @throws \Exception
     */
    public function delete(Media $media)
    {
        if (!$media->delete()) {
            throw new NotDeletedException();
        }
    }
}
