<?php

namespace App\Controllers;

use \App\Models\DataOpkModel;
use App\Models\GalleryModel;
use App\Models\DataDokumenModel;

class AdminController extends BaseController
{
    protected $OpkModel;

    public function __construct()
    {
        //helper('form');
        $this->OpkModel = new DataOpkModel();
        $this->galleryModel = new GalleryModel();
        $this->dokumenModel = new DataDokumenModel();
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

        if ($this->request->getFile("foto") == null) {
            $foto = 'image-not-found.svg';
        } else {
            $filefoto = $this->request->getFile("foto");
            $foto = $filefoto->getRandomName();
            $filefoto->move('assets/opk-images', $foto);
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
        if ($this->request->getVar('Kategori') == 'Pilih Kategori') {
            $target = '/opk';
        } else {
            $target = '/kategori/' . $this->request->getVar('Kategori');
        }
        session()->setFlashData('pesan', 'Data berhasil diinputkan');
        return redirect()->to($target);
    }
    function delete($kategori, $id)
    {
        $opk = $this->OpkModel->find($id);
        if ($opk['foto'] != 'image-not-found.svg') {
            unlink('assets/opk-images/' . $opk['foto']);
        }
        $this->OpkModel->delete($id);
        session()->setFlashData('pesan', 'Data berhasil dihapus');
        return redirect()->to('/kategori/' . $kategori);
    }

    function edit($id)
    {
        $opk = $this->OpkModel->getOPKByNo($id);
        $data = [
            'title' => 'Edit data',
            'opk' => $opk
        ];
        echo view('headerFixedTop', $data);
        echo view('editDataView', $data);
        echo view('footer');
    }
    function do_edit($id)
    {
        $opk = $this->OpkModel->find($id);
        if ($opk['foto'] == 'image-not-found.svg') {
            if ($this->request->getVar('foto') == null) {
                $foto = 'image-not-found.svg';
            } else {
                $filefoto = $this->request->getFile("foto");
                $foto = $filefoto->getRandomName();
                $filefoto->move('assets/opk-images', $foto);
            }
        } else {
            if ($this->request->getVar('foto') != null) {
                $filefoto = $this->request->getFile("foto");
                $foto = $filefoto->getRandomName();
                $filefoto->move('assets/opk-images', $foto);
            } else {
                $foto = $opk['foto'];
            }
        }


        if ($this->request->getVar('deskripsi') == null) {
            $deskripsi = 'Belum ada deskripsi';
        } else {
            $deskripsi = $this->request->getVar('deskripsi');
        }

        $this->OpkModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('namaopk'),
            'kategori' => $this->request->getVar('Kategori'),
            'subkategori' => $this->request->getVar('subKategori'),
            'lokasi' => $this->request->getVar('kabupaten'),
            'kondisi' => $this->request->getVar('kondisi'),
            'deskripsi' => $deskripsi,
            'foto' => $foto,
            'video' => $this->request->getVar('linkVideo')

        ]);
        if ($this->request->getVar('Kategori') == 'Pilih Kategori') {
            $target = '/opk';
        } else {
            $target = '/kategori/' . $this->request->getVar('Kategori');
        }
        session()->setFlashData('pesan', 'Data berhasil diedit');
        return redirect()->to($target);
    }

    function tambahGallery()
    {
        $data = [
            'title' => 'Tambah data'
        ];
        echo view('headerFixedTop', $data);
        echo view('tambahGalleryView');
        echo view('footer');
    }
    function tambahDokumen()
    {
        $data = [
            'title' => 'Tambah data'
        ];
        echo view('headerFixedTop', $data);
        echo view('tambahDokumenView');
        echo view('footer');
    }

    function saveDokumen()
    {
        $file = $this->request->getfile('file');
        $namafile = $file->getName();
        $file->move('assets/dokumen',$namafile);

        $this->dokumenModel->save([
            'nama' => $this->request->getVar('judul'),
            'file' => $namafile
        ]);
        $target = '/dokumen';
        session()->setFlashData('pesan', 'Dokumen berhasil diinputkan');
        return redirect()->to($target);
    }

    function deleteDokumen($id)
    {
        $file = $this->dokumenModel->find($id);
        unlink('assets/dokumen/' . $file['file']);
        $this->dokumenModel->delete($id);
        session()->setFlashData('pesan', 'Dokumen berhasil dihapus');
        return redirect()->to('/dokumen');
    }

    function saveGallery()
    {
        if ($this->request->getVar('foto') == null) {
            $foto = 'image-not-found.svg';
        } else {
            $foto = $this->request->getVar('foto');
        }

        $this->galleryModel->save([
            'judul' => $this->request->getVar('judul'),
            'isi' => $this->request->getVar('isi'),
            'penulis' => $this->request->getVar('penulis'),
            'foto' => $foto
        ]);
        $target = '/news';
        session()->setFlashData('pesan', 'Gallery berhasil diinputkan');
        return redirect()->to($target);
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
