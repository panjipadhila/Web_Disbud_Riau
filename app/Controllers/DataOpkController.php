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
	public function kesenian()
	{
		$opk = $this->OpkModel->where('kategori', 'Kesenian')->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk', $data);
		echo view('footer');
	}
	public function bahasa()
	{
		$opk = $this->OpkModel->where('kategori', 'Bahasa')->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk', $data);
		echo view('footer');
	}
	public function permainantradisional()
	{
		$opk = $this->OpkModel->where('kategori', 'Permainan Tradisional')->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk_nosub', $data);
		echo view('footer');
	}
	public function tradisiLisan()
	{
		$opk = $this->OpkModel->where('kategori', 'Tradisi Lisan')->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk', $data);
		echo view('footer');
	}

	public function manuskrip()
	{
		$opk = $this->OpkModel->where('kategori', 'manuskrip')->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk', $data);
		echo view('footer');
	}

	public function adatIstiadat()
	{
		$opk = $this->OpkModel->where('kategori', 'Adat Istiadat')->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk', $data);
		echo view('footer');
	}

	public function ritus()
	{
		$opk = $this->OpkModel->where('kategori', 'Ritus')->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk', $data);
		echo view('footer');
	}

	public function pengetahuanTradisional()
	{
		$opk = $this->OpkModel->where('kategori', 'Pengetahuan Tradisional')->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk', $data);
		echo view('footer');
	}

	public function teknologiTradisional()
	{
		$opk = $this->OpkModel->where('kategori', 'Teknologi Tradisional')->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk_nosub', $data);
		echo view('footer');
	}
	public function olahragaTradisional()
	{
		$opk = $this->OpkModel->where('kategori', 'Olahraga Tradisional')->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk_nosub', $data);
		echo view('footer');
	}
	public function warisanBudayaBendawi()
	{
		$opk = $this->OpkModel->where('kategori', 'Warisan Budaya Bendawi')->findAll();
		$data = [
			'title' => 'Data OPK | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk', $data);
		echo view('footer');
	}
	public function detail($no)
	{
		$opk = $this->OpkModel->where('no', $no)->findAll();
		$data = [
			'title' => 'Deskripsi | Web Disbud Riau',
			'opk' => $opk
		];
		echo view('headerFixedTop', $data);
		echo view('DataOpk', $data);
		echo view('footer');
	}
}
