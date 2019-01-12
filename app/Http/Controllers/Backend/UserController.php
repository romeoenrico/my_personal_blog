<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function getIndex() {
		$users = User::orderBy('created_at', 'DESC')->paginate(10);
		return view('backend.user.list', compact('users'));
	}

	public function getAdd() {
		// schermata di aggiunta del nuovo autore
		return view('backend.user.add');
	}

	public function store(Request $request) {
		// elaborazione dei dati ed effettiva aggiunta dell'autore
		$this->validate(request(), [

			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed',

		], [

			'first_name.required' => "Specificare il nome.",
			'last_name.required' => "Specificare il cognome.",
			'email.required' => "Specificare l'indirizzo email.",
			'password.required' => "Specificare la password.",

			'email.email' => "Specificare un indirizzo email valido.",
			'email.unique' => "L'indirizzo inserito esiste già! Prova con un altro.",

		]);

		//Create and Save the Users
		$first_name = $request->first_name;
		$last_name = $request->last_name;
		$email = $request->email;
		$password = $request->password;
		$slug = Str::slug($first_name . $last_name);

		$user = User::create([
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'slug' => $slug,
			'password' => bcrypt($password),

		]);

		$request->session()->flash('success_message', 'Utente creato correttamente !');
		return redirect('backend/indexuser');
	}

	public function getDelete($userId, Request $request) {
		$userToDelete = User::findOrFail($userId);
		$userToDelete->delete();
		//$userId->delete();

		$request->session()->flash('success_message', 'Utente cancellato correttamente !');
		return redirect('backend/indexuser');
	}
}
