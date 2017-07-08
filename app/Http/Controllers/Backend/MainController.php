<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller {
	public function getIndex() {
		// qui c'è la dashboard
		return view('backend.dashboard');
	}

	public function getLogin() {
		// qui c'è la pagina di login
		return view('backend.login');
	}

	public function postLogin(Request $request) {
		if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
			return redirect('backend.dashboard');
		} else {
			return redirect('backend.login');
		}

	}

	public function getLogout() {
		// qui c'è la procedura di logout dell'utente
	}
}
