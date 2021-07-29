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
			'museums' => $museum
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
			'museums' => $museum,
			'jenis' => $jenis
		];
		echo view('headerFixedTop', $data);
		echo view('DataMuseum', $data);
		echo view('footer');
	}

	public function detail($id)
	{
		$museum = $this->MuseumModel->find($id);
		$data = [
			'title' => 'Deskripsi | Web Disbud Riau',
			'museum' => $museum
		];
		echo view('headerFixedTop', $data);
		echo view('deskripsi', $data);
		echo view('footer');
	}
}
