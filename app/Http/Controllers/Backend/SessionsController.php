<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class SessionsController extends Controller {

	public function __construct() {

		$this->middleware('auth', ['except' => ['create', 'store']]);
		$this->middleware('guest', ['only' => ['create', 'store']]);
		//$this->middleware('guest', ['except' => 'destroy']);

	}

	public function getIndex() {
		// qui c'è la dashboard
		return view('backend.dashboard');
	}

	public function create() {
		return view('backend.sessions.create');
	}
	public function store(Request $request) {
		$email = $request->email;
		$password = $request->password;
		if (!Auth::attempt(['email' => $email, 'password' => $password])) {
			// Authentication passed...

			return back()->withErrors([

				'message' => 'Please check your credential and try again.',

			]);

		}

		return redirect('dashboard');
		//	return redirect()->home();

	}
	public function destroy() {
		auth()->logout();

		return redirect()->home();

	}

	public function profile() {

		return view('backend.profile');
		//return vire('backend.profile', array('user' => Auth::user()))

	}

	public function update_avatar(Request $request) {
		//handle the user for upload avatar
		if ($request->hasFile('avatar')) {
			$avatar = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars' . "/" . $filename));
			$user = Auth::user();
			$user->avatar = $filename;
			$user->save();
		}
		//	return view('backend.profile', array('user' => Auth::user()));
		return view('backend.profile');
	}
}
