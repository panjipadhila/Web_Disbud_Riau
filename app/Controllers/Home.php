<?php

namespace App\Controllers;

class Home extends BaseController
{
	function index()
	{
		echo view('header');
		echo view('homepage');
		echo view('footer');
	}
	function project()
	{
		echo view('header');
		echo view('project');
		echo view('footer');
	}
	function components()
	{
		echo view('header');
		echo view('components');
		echo view('footer');
	}
}
