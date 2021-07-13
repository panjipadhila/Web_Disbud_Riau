<?php

namespace App\Controllers;

use \App\Models\DataDokumenModel;

class DokumenController extends BaseController
{

	protected $DokumenModel;

	public function __construct()
	{
		$this->DokumenModel = new DataDokumenModel();
	}

	function index()
	{
		$dokumen = $this->DokumenModel->findAll();
		$data = [
			'title' => 'Data Dokumen | Web Disbud Riau',
			'dokumen' => $dokumen
		];
		echo view('headerFixedTop', $data);
		echo view('dokumen', $data);
		echo view('footer');
	}

	public function download($id){
		$dokumenfile = $this->DokumenModel->find($id);
		return $this->response->download('assets/dokumen/'.$dokumenfile['file'], null);
	}

	public function open($id){
		$dokumenfile = $this->DokumenModel->find($id);
		header("Content-Type: application/pdf");
		header("Content-Disposition: inline; filename=\"".$dokumenfile['file']."\";");
	}
	
}
