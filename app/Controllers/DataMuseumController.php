<?php

namespace App\Controllers;

use \App\Models\DataMuseumModel;

class DataMuseumController extends BaseController
{

	protected $OpkModel;

	public function __construct()
	{
		$this->MuseumModel = new DataMuseumModel();
	}

	function index()
	{
		$museum = $this->MuseumModel->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $museum
		];
		echo view('headerFixedTop', $data);
		echo view('DataMuseum', $data);
		echo view('footer');
	}
	function MuseumByJenis($jenis)
	{
			$museum = $this->MuseumModel->getMuseumByJenis($jenis);
			$data = [
				'title' => 'Data Museum | Web Disbud Riau',
				'museum' => $museum,
				'jenis' => $jenis
			];
			echo view('headerFixedTop', $data);
			echo view('DataMuseum');
			echo view('footer');
	}

	public function detail($id)
	{
		$museum = $this->MuseumModel->getMuseumByNo($id);
		$data = [
			'title' => 'Deskripsi | Web Disbud Riau',
			'opk' => $museum
		];
		echo view('headerFixedTop', $data);
		echo view('deskripsi', $data);
		echo view('footer');
	}
}
