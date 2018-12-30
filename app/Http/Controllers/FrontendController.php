<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;

class FrontendController extends Controller {

	public function getIndex()
	{
		// prelevo gli articoli (includendo i dati sulle rispettive categorie ed autore associati)
		$articles = \App\Article::with('categories', 'user')->where('published_at', '<=', 'NOW()')->where('is_published', '=', true)->orderBy('published_at', 'DESC')->paginate(5);

		return view('frontend.home', ['articles' => $articles]);
	}

	/**
 * Mostra la raccolta degli articoli
 *
 * @param ArticleRepository $articleRepository
 * @param Request $request
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 * @throws NotFoundException
 */
	public function getIndexByTag($tags, ArticleRepository $articleRepository, Request $request)
	{
		  $arrTags = array();
			array_push($arrTags, $tags);
			$articles = $articleRepository->getArticlesByTags($arrTags, 10);

			return view('frontend.articlebytag', ['articles' => $articles]);
	}

	public function getArticolo($slug) {

		$article = \App\Article::with('categories', 'user')->where('slug', '=', $slug)->first();

		return view('frontend.article', compact('article'));
	}

	public function getAutore($slug) {

		$author = \App\User::where('slug', '=', $slug)->first();
		$articles = $author->articles()->where('published_at', '<=', 'NOW()')->where('is_published', '=', true)->orderBy('published_at', 'DESC')->paginate(5);

		return view('frontend.author', compact('author', 'articles'));
	}

	public function getCategoria($slug) {

		$currentCategory = \App\Category::where('slug', '=', $slug)->first();
		$articles = $currentCategory->articles()->where('published_at', '<=', 'NOW()')->where('is_published', '=', true)->orderBy('published_at', 'DESC')->paginate(5);

		return view('frontend.category', compact('currentCategory', 'articles'));
	}

}
