<?php

namespace App\Controllers;

use \App\Models\DataKegiatanModel;

class DataKegiatanController extends BaseController
{

    protected $KegiatanModel;

    public function __construct()
    {
        $this->KegiatanModel = new DataKegiatanModel();
    }

    function getAllKegiatan()
    {
        $kegiatan = $this->KegiatanModel->findAll();
        $data = [
            'title' => 'Kegiatan | Web Disbud Riau',
            'kegiatan' => $kegiatan
        ];
        echo view('headerFixedTop', $data);
        echo view('kegiatan', $data);
        echo view('footer');
    }
    function detail($id)
    {
        $kegiatan = $this->KegiatanModel->find($id);
        $data = [
            'title' => 'Kegiatan | Web Disbud Riau',
            'kegiatan' => $kegiatan
        ];
        echo view('headerFixedTop', $data);
        echo view('detailKegiatan', $data);
        echo view('footer');
    }
    // function index()
    // {
    //     $opk = $this->OpkModel->findAll();
    //     $data = [
    //         'title' => 'Data OPK | Web Disbud Riau',
    //         'opk' => $opk
    //     ];
    //     echo view('headerFixedTop', $data);
    //     echo view('DataOpk', $data);
    //     echo view('footer');
    // }
    // function opkByKategori($kategori)
    // {
    //     $opk = $this->OpkModel->getOPKByKategori($kategori);
    //     $data = [
    //         'title' => 'Data OPK | Web Disbud Riau',
    //         'opk' => $opk,
    //         'kategori' => $kategori
    //     ];
    //     echo view('headerFixedTop', $data);
    //     if ($kategori == 'Permainan Tradisional' || $kategori == 'Olahraga Tradisional')
    //         echo view('DataOpk_nosub', $data);
    //     else
    //         echo view('DataOpk');
    //     echo view('footer');
    // }

    // public function detail($no)
    // {
    //     $opk = $this->OpkModel->getOPKByNo($no);
    //     $data = [
    //         'title' => 'Deskripsi | Web Disbud Riau',
    //         'opk' => $opk
    //     ];
    //     echo view('headerFixedTop', $data);
    //     echo view('deskripsi', $data);
    //     echo view('footer');
    // }
}
