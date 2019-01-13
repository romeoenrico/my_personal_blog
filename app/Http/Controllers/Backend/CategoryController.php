<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\CategoryRepository;


class CategoryController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function getIndex(CategoryRepository $categoryRepository) {
	  $categories = $categoryRepository->getAll();
		return view('backend.category.list', compact('categories'));
	}

	public function getAdd() {
		return view('backend.category.add');
	}

	public function postAdd(Request $request, CategoryRepository $categoryRepository) {
		$this->validate(request(), [

			'name' => 'required',
			'description' => 'required',

		], [

			'name.required' => "Specificare il nome.",
			'description.required' => "Specificare la descrizione.",
		]);

		$name = $request->name;
		$description = $request->description;
		$slug = Str::slug($name);

		$category = Category::create([
			'name' => $name,
			'description' => $description,
			'slug' => $slug,
		]);

		try {
            $categoryRepository->save($category);
    } catch (NotSavedException $e) {
            return redirect('backend/indexcategory')->with('error_message', 'Impossibile aggiungere la categoria. Riprovare.');
    }

		$request->session()->flash('success_message', 'Category was successful added!');
		return redirect('backend/indexcategory');

	}

	public function getEdit($categoryId) {
		$category = Category::findOrFail($categoryId);
		return view('backend.category.edit', compact('category'));
	}

	public function postEdit(CategoryRepository $categoryRepository, $categoryId) {
		$this->validate(request(), [
			'name' => 'required',
			'description' => 'required',
		], [
			'name.required' => "Specificare il nome.",
			'description.required' => "Specificare la descrizione.",
		]);

		try {
					 /* @var $category Category */
					 $category = $categoryRepository->findById($categoryId);
		} catch (NotFoundException $e) {
					 return redirect('backend/indexcategory')->with('error_message', 'La categoria scelta non esiste o non è più disponibile.');
	  }

		$category->name = request()->input('name');
		$category->slug = Str::slug($category->name);
		$category->description = request()->input('description');

		try {
					 $categoryRepository->save($category);
		} catch (NotDeletedException $e) {
				return redirect('backend/indexcategory')->with('error_message', 'Impossibile salvare le modifiche per questa categoria. Riprovare.');
		}

		return redirect('backend/indexcategory')->with('success_message', 'Categoria modificata correttamente.');

	}

	public function getDelete(CategoryRepository $categoryRepository, $categoryId, Request $request) {

		try {
            /* @var $category Category */
            $category = $categoryRepository->findById($categoryId);
    } catch (NotFoundException $e) {
        return redirect('backend/indexcategory')->with('error_message', 'La categoria cercata non esiste o non è più disponibile.');
    }
    try {
        $categoryRepository->delete($category);
    } catch (NotDeletedException $e) {
        return redirect('backend/indexcategory')->with('error_message', 'Impossibile elminare la categoria scelta. Riprovare.');
    }

		$request->session()->flash('success_message', 'Categoria cancellata correttamente !');
		return redirect('backend/indexcategory');

	}

}
