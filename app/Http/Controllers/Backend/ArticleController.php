<?php

namespace App\Http\Controllers\Backend;

use App\Article;
use App\Category;
use App\Commands\SaveArticleCommand;
use App\Http\Controllers\Controller;
use App\Exceptions\NotSavedException;
use App\Repositories\CategoryRepository;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use JildertMiedema\LaravelTactician\DispatchesCommands;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class ArticleController extends Controller {

	use DispatchesCommands;

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Mosta gli articoli a sistema paginati per il numero intero
	 *  
	 */
	public function getIndex(ArticleRepository $articleRepository) {
		$articles = $articleRepository->getAll(10);
		return view('backend.article.list', compact('articles'));
	}

	public function getAdd() {
		$categories = Category::all();

		return view('backend.article.add', compact('categories'));
	}

	public function postAdd(Request $request, CategoryRepository $categoryRepository) {
		$this->validate($request, [
			'title' => 'required',
			'body' => 'required',
			'published_at' => 'required|date_format:d/m/Y H:i',
			'metadescription' => 'required',
			'metakeys' => 'required',

		], [
			'title.required' => 'Specificare il titolo!',
			'body.required' => 'Un articolo non può essere vuoto!',
			'published_at.required' => 'Specificare la data di pubblicazione!',
			'published_at.date_format' => 'Specificare una data nel formato gg/mm/aaaa oo:mm',

		]);

		$article = Article::createFromData(
			$request->get('title'),
			$request->get('body'),
			$request->get('is_published'),
			$request->get('metadescription'),
			$request->get('metakeys')
	  );

		$article->slug = 	Str::slug($article->title);
		$date = \DateTime::createFromFormat('d/m/Y H:i', $request->get('published_at'));
		$article->published_at = $date->format('Y-m-d H:i');

    $categories = $categoryRepository->getByIds($request->get('categories'));

		try {
					$this->dispatch(new SaveArticleCommand(
							$article,
							Auth::user(),
							$categories
					));

			} catch (NotSavedException $e) {
					return redirect('backend/addarticle')
							->withInput()
							->with('error_message', 'Problemi in fase di aggiunta. Riprovare.');
			}

		$request->session()->flash('success_message', 'Article was successful added!');
		return redirect('backend/indexarticle');
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

		$this->update_postImage($request, $article);

		$article->save();

		$article->categories()->sync($request->get('categories'));

		return redirect('backend/editarticle/' . $articleId)->with('success_message', 'Articolo modificato correttamente.');
	}

	public function getDelete($articleId) {
		Article::find($articleId)->delete();
		return redirect('backend/indexarticle')->with('success_message', 'Articolo cancellato correttamente.');
	}

	private function update_postImage(Request $request, Article $article) {
		dd($request);
		if ($request->hasFile('postimage')) {
			$postimage = $request->file('postimage');
			$filename = time() . '.' . $postimage->getClientOriginalExtension();
			Image::make($postimage)->resize(500, 200)->save(public_path('/uploads/postimage' . "/" . $filename));
			$article->post_image = $filename;
		}

	}



}
