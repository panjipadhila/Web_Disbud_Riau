<?php

namespace App\Controllers;

use \App\Models\DataOpkModel;

class AdminController extends BaseController
{
    protected $OpkModel;

    public function __construct()
    {
        $this->OpkModel = new DataOpkModel();
    }
    function adminpage()
    {
        $data = [
            'title' => 'Admin | Web Disbud Riau',
        ];
        echo view('headerFixedTop', $data);
        echo view('adminpage', $data);
        echo view('footer');
    }

    function tambah()
    {
        $data = [
            'title' => 'Tambah data'
        ];
        echo view('headerFixedTop', $data);
        echo view('tambahDataView');
        echo view('footer');
    }

    function save()
    {
        $foto = '';
        $deskripsi = '';
        if ($this->request->getVar('foto') == null) {
            $foto = 'image-not-found.svg';
        } else {
            $foto = $this->request->getVar('foto');
        }

        if ($this->request->getVar('deskripsi') == null) {
            $deskripsi = 'Belum ada deskripsi';
        } else {
            $deskripsi = $this->request->getVar('deskripsi');
        }

        $this->OpkModel->save([
            'nama' => $this->request->getVar('namaopk'),
            'kategori' => $this->request->getVar('Kategori'),
            'subkategori' => $this->request->getVar('subKategori'),
            'lokasi' => $this->request->getVar('kabupaten'),
            'kondisi' => $this->request->getVar('kondisi'),
            'deskripsi' => $deskripsi,
            'foto' => $foto,
            'video' => $this->request->getVar('linkVideo')

        ]);
        return redirect()->to('/opk');
    }
    // function register()
    // {
    //     $data = [
    //         'title' => 'Admin | Web Disbud Riau',
    //     ];
    //     echo view('register', $data);
    // }
    // function login()
    // {
    //     $data = [
    //         'title' => 'Login Admin | Web Disbud Riau',
    //     ];
    //     echo view('headerFixedTop', $data);
    //     echo view('login', $data);
    //     echo view('footer');
    // }

}
