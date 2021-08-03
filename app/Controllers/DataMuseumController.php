<?php

namespace App\Controllers;

use \App\Models\DataMuseumModel;
use \App\Models\DataNaskahModel;
use \App\Models\DataNumismatikaModel;

class DataMuseumController extends BaseController
{

	protected $OpkModel;

	public function __construct()
	{
		$this->MuseumModel = new DataMuseumModel();
		$this->NaskahModel = new DataNaskahModel();
		$this->NumismatikaModel = new DataNumismatikaModel();
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

	function dataNumismatika()
	{
		$numismatika = $this->NumismatikaModel->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'numismatika' => $numismatika
		];
		echo view('headerFixedTop', $data);
		echo view('DataNumismatika', $data);
		echo view('footer');
	}

	function dataNaskah()
	{
		$naskah = $this->NaskahModel->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'naskah' => $naskah
		];
		echo view('headerFixedTop', $data);
		echo view('DataNaskahView', $data);
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
		echo view('DetailMuseum', $data);
		echo view('footer');
	}

	public function detailNaskah($id)
	{
		$museum = $this->NaskahModel->find($id);
		$data = [
			'title' => 'Deskripsi | Web Disbud Riau',
			'museum' => $museum
		];
		echo view('headerFixedTop', $data);
		echo view('DetailMuseum', $data);
		echo view('footer');
	}

	public function detailNumismatika($id)
	{
		$museum = $this->NaskahModel->find($id);
		$data = [
			'title' => 'Deskripsi | Web Disbud Riau',
			'museum' => $museum
		];
		echo view('headerFixedTop', $data);
		echo view('DetailMuseum', $data);
		echo view('footer');
	}
}
