<?php

namespace App\Controllers;

use \App\Models\DataOpkModel;

class DataOpkController extends BaseController
{

	protected $OpkModel;

	public function __construct()
	{
		$this->OpkModel = new DataOpkModel();
	}

	function index()
	{
		$opk = $this->OpkModel->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk', $data);
		echo view('footer');
	}
	function opkByKategori($kategori)
	{
		$opk = $this->OpkModel->getOPKByKategori($kategori);
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk,
			'kategori' => $kategori
		];
		echo view('headerFixedTop', $data);
		if ($kategori == '')
			echo view('DataOpk', $data);
		echo view('footer');
	}

	public function detail($no)
	{
		$opk = $this->OpkModel->getOPKByNo($no);
		$data = [
			'title' => 'Deskripsi | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('deskripsi', $data);
		echo view('footer');
	}
}
