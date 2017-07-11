<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;

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
	}

	public function postAdd() {
		// elaborazione dei dati ed effettiva aggiunta dell'autore
	}

	public function getDelete($userId) {
		$userToDelete = User::find($userId);
		$userToDelete->delete();
		//$userId->delete();
		return redirect('backend/indexuser');
	}
}
