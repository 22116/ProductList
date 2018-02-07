<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;

abstract class BaseResourceController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth', [ 'except' => ['index', 'show'] ]);
	}
}