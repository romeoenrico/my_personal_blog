<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function getIndex() {
		$categories = Category::with('articles')->orderBy('created_at', 'DESC')->paginate(10);
		return view('backend.category.list', compact('categories'));
	}

	public function getAdd() {
		return view('backend.category.add');
	}

	public function postAdd(Request $request) {
		$this->validate(request(), [

			'name' => 'required',
			'description' => 'required',

		], [

			'name.required' => "Specificare il nome.",
			'description.required' => "Specificare la descrizione.",
		]);

		//Create and Save the Users
		$name = $request->name;
		$description = $request->description;
		$slug = Str::slug($name);

		$category = Category::create([
			'name' => $name,
			'description' => $description,
			'slug' => $slug,

		]);

		//dd(request()->session());
		request()->session()->flash('success_message', 'Categoria aggiunta correttamente !');
		return redirect('backend/indexcategory');

	}

	public function getEdit($categoryId) {
		$category = Category::find($categoryId);
		return view('backend.category.edit', compact('category'));
	}

	public function postEdit($categoryId) {
		$this->validate(request(), [
			'name' => 'required',
			'description' => 'required',
		], [
			'name.required' => "Specificare il nome.",
			'description.required' => "Specificare la descrizione.",
		]);

		$category = Category::find($categoryId);

		$category->name = request()->input('name');
		$category->slug = Str::slug($category->name);
		$category->description = request()->input('description');

		$category->save();

		return redirect('backend/editcategory/' . $categoryId)->with('success_message', 'Categoria modificata correttamente.');

	}

	public function getDelete($categoryId, Request $request) {
		Category::find($categoryId)->delete();

		$request->session()->flash('success_message', 'Categoria cancellata correttamente !');
		return redirect('backend/indexcategory');

	}

}
