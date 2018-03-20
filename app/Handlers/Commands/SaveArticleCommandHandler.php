<?php

namespace App\Handlers\Commands;

use App\Commands\SaveArticleCommand;

class SaveArticleCommandHandler {

    public function handle(SaveArticleCommand $command) {
        $article = $command->getArticle();
        $user = $command->getUser();
        $categories = $command->getCategories();

        // associo l'articolo all'autore
        $article->user()->associate($user);

        // salvo l'articolo
        $article->save();

        // associo le categorie all'articolo
        $article->categories()->sync($categories->pluck('id'));
    }

}
