<?php

namespace App\Http\Controllers\Backend;

use App\Article;
use App\Category;
use App\Commands\SaveArticleCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleSaveRequest;
use App\Exceptions\NotSavedException;
use App\Exceptions\NotFoundException;
use App\Exceptions\NonDeletedException;
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

	public function getAdd(CategoryRepository $categoryRepository) {

		$categories = $categoryRepository->getAll();
		$tags = Article::existingTags();
		return view('backend.article.add', compact('categories', 'tags'));
	}

	/**
	 * Salva un nuovo articolo, i cui dati sono contenuti in $request.
	 *
	 * @param ArticleSaveRequest $requests
	 * @param CategoryRepository $categoryRepository
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postAdd(ArticleSaveRequest $request, CategoryRepository $categoryRepository) {

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

    $tags = $article->tag($request->get('tags'));

		$request->session()->flash('success_message', 'Article è stato aggiunto correttamente!');
		return redirect('backend/indexarticle');
	}

	public function getEdit(
			$articleId,
			CategoryRepository $categoryRepository,
			ArticleRepository $articleRepository
		)
	{
		$categories = $categoryRepository->getAll();

		$article = $this->findArticleById($articleId, $articleRepository);

		$tags = $article->tags;

		return view('backend.article.edit', compact('article', 'categories', 'tags'));
	}

	public function postEdit(
			ArticleSaveRequest $request,
			CategoryRepository $categoryRepository,
			ArticleRepository $articleRepository,
			$articleId) {

		$article = $this->findArticleById($articleId, $articleRepository);

		$article->title = $request->get('title');
		$article->slug = Str::slug($article->title);
		$article->body = $request->get('body');
		$article->is_published = $request->get('is_published');
		$date = \DateTime::createFromFormat('d/m/Y H:i', $request->get('published_at'));
		$article->published_at = $date->format('Y-m-d H:i');
		$article->meta_keys = $request->get('metakeys');
		$article->meta_description = $request->get('metadescription');

		$this->update_postImage($request, $article);

		//$article->categories()->sync($request->get('categories'));
		$categories = $categoryRepository->getByIds($request->get('categories'));

		try {
					$this->dispatch(new SaveArticleCommand(
							$article,
							$article->user,
							$categories
					));

			} catch (NotSavedException $e) {
					return redirect('backend/editarticle')
							->withInput()
							->with('error_message', 'Problemi in fase di modifica. Riprovare.');
			}

			$tags = $article->retag($request->get('tags'));

			$request->session()->flash('success_message', 'Articolo correttamente modificato!');
			return redirect('backend/indexarticle');
	}

	public function getDelete(ArticleRepository $articleRepository, $articleId) {

		$article = $this->findArticleById($articleId, $articleRepository);
		try {
				$articleRepository->delete($article);
		} catch (NotDeletedException $e) {
				return redirect('backend/indexarticle')->with('error_message', 'Impossibile cancellare l\'articolo selezionato.');
		}
		return redirect('backend/indexarticle')->with('success_message', 'Articolo cancellato correttamente.');
	}

	private function update_postImage(
			Request $request,
			Article $article) {

		if ($request->hasFile('postimage')) {
			$postimage = $request->file('postimage');
			$filename = time() .  '_' . $article->id . '_' . $article->title . '.' . $postimage->getClientOriginalExtension();
			Image::make($postimage)->resize(500, 200)->save(public_path('/uploads/images' . "/" . $filename));
			$article->post_image = $filename;
			return $article;
		}

	}

	private function findArticleById($articleId, $articleRepository){
		try {
				$article = $articleRepository->findById($articleId);
		} catch (NotFoundException $e) {
				return redirect('backend/indexarticle')->with('error_message', 'L\'articolo scelto non esiste o non è disponibile.');
		}
			return $article;
	}



}
