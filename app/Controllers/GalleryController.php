<?php

namespace App\Controllers;

use \App\Models\GalleryModel;

class GalleryController extends BaseController
{

    protected $GalleryModel;

    public function __construct()
    {
        $this->GalleryModel = new GalleryModel();
    }
    function index()
    {
        $pager = \Config\Services::pager();
        $gallery = $this->GalleryModel->getGallery();
        $data = [
            'title' => 'News',
            'news' => $this->GalleryModel->paginate(3, 'news'),
            'pager' => $this->GalleryModel->pager,

        ];
        echo view('headerWithBootstrap', $data);
        echo view('news', $data);
        echo view('footer');
    }
    public function detailGallery($id)
	{
		$news = $this->GalleryModel->find($id);
		$data = [
			'title' => 'Deskripsi | Web Disbud Riau',
			'news' => $news
		];
		echo view('headerWithBootstrap', $data);
		echo view('detailGallery', $data);
		echo view('footer');
	}
}
