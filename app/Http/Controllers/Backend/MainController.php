<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class MainController extends Controller {

	public function __construct() {

		$this->middleware('guest', ['except' => ['getIndex']]);
		//$this->middleware('guest', ['only' => ['create', 'store']]);
		//$this->middleware('guest', ['except' => 'destroy']);

	}

	public function getIndex() {
		// qui c'è la dashboard
		return view('backend.dashboard');
	}
}
