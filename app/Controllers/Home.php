<?php

namespace App\Controllers;

use \App\Models\DataOpkModel;

class Home extends BaseController
{
	protected $OpkModel;

	public function __construct()
	{
		$this->OpkModel = new DataOpkModel();
	}

	function index()
	{
		$opk = $this->OpkModel->countAll();
		$data = [
			'title' => 'Home | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('header', $data);
		echo view('homepage', $data);
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

	function kegiatan()
	{
		$data = [
			'title' => 'Kegiatan | Web Disbud Riau'
		];
		echo view('headerFixedTop', $data);
		echo view('kegiatan');
		echo view('footer');
	}
	function museum()
	{
		$data = [
			'title' => 'Museum | Web Disbud Riau'
		];
		echo view('header', $data);
		echo view('museum');
		echo view('footer');
	}
	function detailBidang($bidang)
	{
		$data = [
			'title' => 'Bidang | Web Disbud Riau',
			'bidang' => $bidang
		];
		echo view('headerFixedTop', $data);
		echo view('detailBidang', $data);
		echo view('footer');
	}
}
