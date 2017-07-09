<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller {
	public function create() {
		return view('backend.registration.create');
	}

	public function store(Request $request) {
		//Validate the form
		$this->validate(request(), [

			'first_name' => 'required',

			'last_name' => 'required',

			'email' => 'required|email',

			'password' => 'required|confirmed',

		]);

		//Create and Save the Users
		$first_name = $request->first_name;
		$last_name = $request->last_name;
		$email = $request->email;
		$password = $request->password;
		$strSlugLower = strtolower($first_name . '_' . $last_name);
		$user = User::create([
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'slug' => $strSlugLower,
			'password' => bcrypt($password),

		]);

		//Sign them in
		// \Auth::login();
		auth()->login($user);

		//Redirect to the home page
		//return redirect()->home();
		return redirect('dashboard');

	}
}
