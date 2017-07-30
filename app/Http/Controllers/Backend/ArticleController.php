<?php

namespace App\Http\Controllers\Backend;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function getIndex() {
		$articles = Article::with('user', 'categories')->orderBy('published_at', 'DESC')->paginate(10);
		return view('backend.article.list', compact('articles'));
	}

	public function getAdd() {
		$categories = Category::all();

		return view('backend.article.add', compact('categories'));
	}

	public function postAdd(Request $request) {
		$this->validate($request, [
			'title' => 'required',
			'body' => 'required',
			'published_at' => 'required|date_format:d/m/Y H:i',
			'meta_keys' => 'required',
			'meta_description' => 'required',
		], [
			'title.required' => 'Specificare il titolo!',
			'body.required' => 'Un articolo non può essere vuoto!',
			'published_at.required' => 'Specificare la data di pubblicazione!',
			'published_at.date_format' => 'Specificare una data nel formato gg/mm/aaaa oo:mm',
			'meta_keys.required' => 'Specificare una o più Meta Key',
			'meta_description.required' => 'Specificare una o più Meta Description',
		]);

		$article = new Article;

		$article->title = $request->get('title');
		$article->slug = Str::slug($article->title);
		$article->body = $request->get('body');
		$article->is_published = $request->get('is_published');

		$date = \DateTime::createFromFormat('d/m/Y H:i', $request->get('published_at'));
		$article->published_at = $date->format('Y-m-d H:i');

		$article->meta_keys = $request->get('metakeys');
		$article->meta_description = $request->get('metadescription');
		$article->user_id = Auth::user()->id;

		$article->save();

		$article->categories()->sync($request->get('categories'));

		return redirect('backend/indexarticle')->with('success_message', 'Articolo aggiunto correttamente.');
	}

	public function getEdit($articleId) {
		$categories = Category::all();

		$article = Article::find($articleId);

		return view('backend.article.edit', compact('article', 'categories'));
	}

	public function postEdit(Request $request, $articleId) {
		$this->validate($request, [
			'title' => 'required',
			'body' => 'required',
			'published_at' => 'required|date_format:d/m/Y H:i',
		], [
			'title.required' => 'Specificare il titolo!',
			'body.required' => 'Un articolo non può essere vuoto!',
			'published_at.required' => 'Specificare la data di pubblicazione!',
			'published_at.date_format' => 'Specificare una data nel formato gg/mm/aaaa oo:mm',
		]);

		$article = Article::find($articleId);

		$article->title = $request->get('title');
		$article->slug = Str::slug($article->title);
		$article->body = $request->get('body');
		$article->is_published = $request->get('is_published');

		$date = \DateTime::createFromFormat('d/m/Y H:i', $request->get('published_at'));
		$article->published_at = $date->format('Y-m-d H:i');

		$article->meta_keys = $request->get('metakeys');
		$article->meta_description = $request->get('metadescription');

		$article->save();

		$article->categories()->sync($request->get('categories'));

		return redirect('backend/editarticle/' . $articleId)->with('success_message', 'Articolo modificato correttamente.');
	}

	public function getDelete($articleId) {
		Article::find($articleId)->delete();
		return redirect('backend/indexarticle')->with('success_message', 'Articolo cancellato correttamente.');
	}

}
