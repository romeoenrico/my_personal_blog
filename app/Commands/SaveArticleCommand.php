<?php

namespace App\Commands;

use App\User;
use App\Article;
use App\Category;
use Illuminate\Database\Eloquent\Collection;

class SaveArticleCommand {

    private $article;
    private $user;
    private $categories;

    public function __construct(Article $article, User $user, Collection $categories) {
        $this->article = $article;
        $this->user = $user;
        $this->categories = $categories;
    }

    public function getArticle() {
        return $this->article;
    }

    public function getUser() {
        return $this->user;
    }

    public function getCategories() {
        return $this->categories;
    }
}
