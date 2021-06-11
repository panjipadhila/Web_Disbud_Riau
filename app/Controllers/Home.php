<?php

namespace App\Controllers;

class Home extends BaseController
{
	function index()
	{
		return view('welcome_message');
	}
}
