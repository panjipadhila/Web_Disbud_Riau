<?php

namespace App\Controllers;

class Home extends BaseController
{
	function index()
	{
		$data = [
			'title' => 'Home | Web Disbud Riau'
		];
		echo view('header', $data);
		echo view('homepage');
		echo view('footer');
	}
	function news()
	{
		$data = [
			'title' => 'News'
		];
		echo view('header', $data);
		echo view('news');
		echo view('footer');
	}
	function components()
	{
		$data = [
			'title' => 'Components'
		];
		echo view('header', $data);
		echo view('components');
		echo view('footer');
	}

	function opk()
	{
		$data = [
			'title' => 'OPK | Web Disbud Riau'
		];
		echo view('headerFixedTop', $data);
		echo view('opk');
		echo view('footer');
	}
}
