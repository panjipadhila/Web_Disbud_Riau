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
		if (logged_in() || in_groups('admin-kabupaten')) {
			$opk = $this->OpkModel->getOPKByKategoriLokasi(user()->lokasi, $kategori);
			$data = [
				'title' => 'Data OPK | Web Disbud Riau',
				'opk' => $opk,
				'kategori' => $kategori
			];
			echo view('headerFixedTop', $data);
			if ($kategori == 'Permainan Tradisional' || $kategori == 'Olahraga Tradisional')
				echo view('DataOpk_nosub', $data);
			else
				echo view('DataOpk');
			echo view('footer');
		} else {
			$opk = $this->OpkModel->getOPKByKategori($kategori);
			$data = [
				'title' => 'Data OPK | Web Disbud Riau',
				'opk' => $opk,
				'kategori' => $kategori
			];
			echo view('headerFixedTop', $data);
			if ($kategori == 'Permainan Tradisional' || $kategori == 'Olahraga Tradisional')
				echo view('DataOpk_nosub', $data);
			else
				echo view('DataOpk');
			echo view('footer');
		}
	}

	public function detail($id)
	{
		$opk = $this->OpkModel->getOPKByNo($id);
		$data = [
			'title' => 'Deskripsi | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('deskripsi', $data);
		echo view('footer');
	}
}
