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
		$fileOpen = 'assets/dokumen/'.$dokumenfile['file'];
		// //echo $fileOpen;
		// header("Content-Type: application/pdf");
		// header("Content-length: ". filesize($fileOpen) );
		// readfile($fileOpen);

		$url = "assets/dokumen/".$dokumenfile['file'];
		$content = file_get_contents($url);
	
		header('Content-Type: application/pdf');
		header('Content-Length: ' . strlen($content));
		header('Content-Disposition: inline; filename='.$dokumenfile['file']);
		header('Cache-Control: private, max-age=0, must-revalidate');
		header('Pragma: public');
		ini_set('zlib.output_compression','0');
	
		die($content);
	}
	
}
