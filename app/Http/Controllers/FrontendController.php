<?php

namespace App\Http\Controllers;
use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Redis;
use App\Exceptions\NotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FrontendController extends Controller {

	public function getIndex(ArticleRepository $articleRepository)
	{
		// prelevo gli articoli (includendo i dati sulle rispettive categorie ed autore associati)
		//$query = $articleRepository->getAll(10); 
		$articles = Article::with('categories', 'user')->where('published_at', '<=', 'NOW()')->where('is_published', '=', true)->orderBy('published_at', 'DESC')->paginate(10);

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

	public function getArticle(ArticleRepository $articleRepository, $slug) {

		try {
				$article = $articleRepository->findBySlug($slug, true);
				//for trening articles
				Redis::zincrby('trending_articles', 1, $article);
				return view('frontend.article', compact('article'));
	  } catch (NotFoundException $e) {
				throw new NotFoundHttpException;
		}

	}

	public function getTrandingArticles() {

     $trending = Redis::zrevrange('trending_articles', 0, 2);

		 $trending = \App\Article::hydrate(
			 	array_map('json_decode', $trending)
		 );
	   return($trending);

	}

	public function getAuthor($slug) {

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
