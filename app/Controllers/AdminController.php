<?php

namespace App\Controllers;

class AdminController extends BaseController
{
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
        $this->DataOpkModel->save([
            'nama' => $this->request->getVar('nama'),
            'kategori' => $this->request->getVar('kategori'),
            'subkategori' => $this->request->getVar('subkategori'),
            'lokasi' => $this->request->getVar('lokasi'),
            'kondisi' => $this->request->getVar('kondisi'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $this->request->getVar('foto'),
            'video' => $this->request->getVar('video')

        ]);
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
