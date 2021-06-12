<?php

namespace App\Controllers;

class Home extends BaseController
{
	function index()
	{
		return view('homepage');
	}
	function project()
	{
		return view('project');
	}
	function components()
	{
		return view('components');
	}
}
