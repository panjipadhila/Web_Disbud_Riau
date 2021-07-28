<?php

namespace App\Controllers;

use \App\Models\DataOpkModel;
use App\Models\GalleryModel;
use App\Models\DataDokumenModel;
use App\Models\DataMuseumModel;
use DateTime;

class AdminController extends BaseController
{
    protected $OpkModel;

    public function __construct()
    {
        //helper('form');
        $this->OpkModel = new DataOpkModel();
        $this->galleryModel = new GalleryModel();
        $this->dokumenModel = new DataDokumenModel();
        $this->museumModel = new DataMuseumModel();
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
        $file->move('assets/dokumen', $namafile);
        
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
        // if ($this->request->getVar('foto') == null) {
            //     $foto = 'image-not-found.svg';
            // } else {
                //     $foto = $this->request->getVar('foto');
                // }
                if ($this->request->getFile("foto") == null) {
                    $foto = 'image-not-found.svg';
                } else {
                    $filefoto = $this->request->getFile("foto");
                    $foto = $filefoto->getRandomName();
                    $filefoto->move('doc/gallery', $foto);
                }
                $this->galleryModel->save([
                    'judul' => $this->request->getVar('judul'),
                    'isi' => $this->request->getVar('isi'),
                    'created_at' => date("Y-m-d H:i:s"),
                    'penulis' => $this->request->getVar('penulis'),
                    'foto' => $foto
                ]);
                $target = '/news';
                session()->setFlashData('pesan', 'Gallery berhasil diinputkan');
                return redirect()->to($target);
            }
            function deleteGallery($id)
            {
                $file = $this->galleryModel->find($id);
                unlink('doc/gallery/' . $file['foto']);
                $this->galleryModel->delete($id);
                session()->setFlashData('pesan', 'Gallery berhasil dihapus');
                return redirect()->to('/news');
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
    function tambahMuseum()
    {
        $data = [
            'title' => 'Tambah data'
        ];
        echo view('headerFixedTop', $data);
        echo view('TambahMuseumView');
        echo view('footer');
    }
    function saveMuseum()
    {
        
    
        if ($this->request->getFile("gambar") == null) {
            $foto = 'image-not-found.svg';
        } else {
            $filefoto = $this->request->getFile("gambar");
            $foto = $filefoto->getRandomName();
            $filefoto->move('assets/museum-images', $foto);
        }
    
        if ($this->request->getVar('namaBenda') == null) {
            $namaBenda = 'Belum ada deskripsi';
        } else {
            $namaBenda = $this->request->getVar('namaBenda');
        }
        if ($this->request->getVar('uraian') == null) {
            $uraian = 'Belum ada deskripsi';
        } else {
            $uraian = $this->request->getVar('uraian');
        }
        if ($this->request->getVar('noInventarisLama') == null) {
            $noInvestarisLama = 'Belum ada deskripsi';
        } else {
            $noInvestarisLama = $this->request->getVar('noInvestarisLama');
        }
        if ($this->request->getVar('noInventarisBaru') == null) {
            $noInvestarisBaru = 'Belum ada deskripsi';
        } else {
            $noInvestarisBaru = $this->request->getVar('noInvestarisBaru');
        }
        if ($this->request->getVar('noRegister') == null) {
            $noRegister = 'Belum ada deskripsi';
        } else {
            $noRegister = $this->request->getVar('noRegister');
        }
        if ($this->request->getVar('bahan') == null) {
            $bahan = 'Belum ada deskripsi';
        } else {
            $bahan = $this->request->getVar('bahan');
        }
        if ($this->request->getVar('bentuk') == null) {
            $bentuk = 'Belum ada deskripsi';
        } else {
            $bentuk = $this->request->getVar('bentuk');
        }
        if ($this->request->getVar('fungsi') == null) {
            $fungsi = 'Belum ada deskripsi';
        } else {
            $fungsi = $this->request->getVar('fungsi');
        }
        if ($this->request->getVar('ukuran') == null) {
            $ukuran = 'Belum ada deskripsi';
        } else {
            $ukuran = $this->request->getVar('ukuran');
        }
        if ($this->request->getVar('asalBuat') == null) {
            $asalBuat = 'Belum ada deskripsi';
        } else {
            $asalBuat = $this->request->getVar('asalBuat');
        }
        if ($this->request->getVar('asalDapat') == null) {
            $asalDapat = 'Belum ada deskripsi';
        } else {
            $asalDapat = $this->request->getVar('asalDapat');
        }
        if ($this->request->getVar('caraDapat') == null) {
            $caraDapat = 'Belum ada deskripsi';
        } else {
            $caraDapat = $this->request->getVar('caraDapat');
        }
        if ($this->request->getVar('tanggalMasuk') == null) {
            $tanggalMasuk = 'Belum ada deskripsi';
        } else {
            $tanggalMasuk = $this->request->getVar('tanggalMasuk');
        }
        if ($this->request->getVar('kondisiBenda') == null) {
            $kondisiBenda = 'Belum ada deskripsi';
        } else {
            $kondisiBenda = $this->request->getVar('kondisiBenda');
        }
        if ($this->request->getVar('tempatPenyimpanan') == null) {
            $tempatPenyimpanan = 'Belum ada deskripsi';
        } else {
            $tempatPenyimpanan = $this->request->getVar('tempatPenyimpanan');
        }
        if ($this->request->getVar('dicatatOleh') == null) {
            $dicatatOleh = 'Belum ada deskripsi';
        } else {
            $dicatatOleh = $this->request->getVar('dicatatOleh');
        }
        if ($this->request->getVar('tanggal') == null) {
            $tanggal = 'Belum ada deskripsi';
        } else {
            $tanggal = $this->request->getVar('tanggal');
        }
        if ($this->request->getVar('lainnya') == null) {
            $lainnya = 'Belum ada deskripsi';
        } else {
            $lainnya = $this->request->getVar('lainnya');
        }
        if ($this->request->getVar('gambar') == null) {
            $gambar = 'Belum ada deskripsi';
        } else {
            $gambar = $this->request->getVar('gambar');
        }
    
        $this->museumModel->save([
            'namaBenda' => $namaBenda,
            'uraian' => $uraian,
            'noInvestarisLama' => $noInvestarisLama,
            'noInvestarisBaru' => $noInvestarisBaru,
            'noRegister' => $noRegister,
            'bahan' => $bahan,
            'bentuk' => $bentuk,
            'fungsi' => $fungsi,
            'ukuran' => $ukuran,
            'asalBuat' => $asalBuat,
            'asalDapat' => $asalDapat,
            'caraDapat' => $caraDapat,
            'tanggalMasuk' => $tanggalMasuk,
            'kondisiBenda' => $kondisiBenda,
            'tempatPenyimpanan' => $tempatPenyimpanan,
            'dicatatOleh' => $dicatatOleh,
            'tanggal' => $tanggal,
            'lainnya' => $lainnya,
            'gambar' => $gambar
    
        ]);
            $target = '/museum';
        
        session()->setFlashData('pesan', 'Data berhasil diinputkan');
        return redirect()->to($target);
    }
    function deleteMuseum($id)
    {
        $museum = $this->museumModel->find($id);
        if ($museum['gambar'] != 'image-not-found.svg') {
            unlink('assets/museum-images/' . $museum['gambar']);
        }
        $this->museumModel->delete($id);
        session()->setFlashData('pesan', 'Data berhasil dihapus');
        return redirect()->to('/dataMuseum/');
    }
    
    function editMuseum($id)
    {
        $museum = $this->museumModel->find($id);
        $data = [
            'title' => 'Edit data',
            'museum' => $museum
        ];
        echo view('headerFixedTop', $data);
        echo view('editDataMuseumView', $data);
        echo view('footer');
    }
    function do_editMuseum($id)
    {
        $museum = $this->museumModel->find($id);
        if ($museum['gambar'] == 'image-not-found.svg') {
            if ($this->request->getVar('gamabar') == null) {
                $foto = 'image-not-found.svg';
            } else {
                $filefoto = $this->request->getFile("gambar");
                $foto = $filefoto->getRandomName();
                $filefoto->move('assets/museum-images', $foto);
            }
        } else {
            if ($this->request->getVar('gambar') != null) {
                $filefoto = $this->request->getFile("gambar");
                $foto = $filefoto->getRandomName();
                $filefoto->move('assets/museum-images', $foto);
            } else {
                $foto = $museum['gambar'];
            }
        }
        if ($this->request->getVar('namaBenda') == null) {
            $namaBenda = 'Belum ada deskripsi';
        } else {
            $namaBenda = $this->request->getVar('namaBenda');
        }
        if ($this->request->getVar('uraian') == null) {
            $uraian = 'Belum ada deskripsi';
        } else {
            $uraian = $this->request->getVar('uraian');
        }
        if ($this->request->getVar('noInvestarisLama') == null) {
            $noInvestarisLama = 'Belum ada deskripsi';
        } else {
            $noInvestarisLama = $this->request->getVar('noInvestarisLama');
        }
        if ($this->request->getVar('noInvestarisBaru') == null) {
            $noInvestarisBaru = 'Belum ada deskripsi';
        } else {
            $noInvestarisBaru = $this->request->getVar('noInvestarisBaru');
        }
        if ($this->request->getVar('noRegister') == null) {
            $noRegister = 'Belum ada deskripsi';
        } else {
            $noRegister = $this->request->getVar('noRegister');
        }
        if ($this->request->getVar('bahan') == null) {
            $bahan = 'Belum ada deskripsi';
        } else {
            $bahan = $this->request->getVar('bahan');
        }
        if ($this->request->getVar('bentuk') == null) {
            $bentuk = 'Belum ada deskripsi';
        } else {
            $bentuk = $this->request->getVar('bentuk');
        }
        if ($this->request->getVar('fungsi') == null) {
            $fungsi = 'Belum ada deskripsi';
        } else {
            $fungsi = $this->request->getVar('fungsi');
        }
        if ($this->request->getVar('ukuran') == null) {
            $ukuran = 'Belum ada deskripsi';
        } else {
            $ukuran = $this->request->getVar('ukuran');
        }
        if ($this->request->getVar('asalBuat') == null) {
            $asalBuat = 'Belum ada deskripsi';
        } else {
            $asalBuat = $this->request->getVar('asalBuat');
        }
        if ($this->request->getVar('asalDapat') == null) {
            $asalDapat = 'Belum ada deskripsi';
        } else {
            $asalDapat = $this->request->getVar('asalDapat');
        }
        if ($this->request->getVar('caraDapat') == null) {
            $caraDapat = 'Belum ada deskripsi';
        } else {
            $caraDapat = $this->request->getVar('caraDapat');
        }
        if ($this->request->getVar('tanggalMasuk') == null) {
            $tanggalMasuk = 'Belum ada deskripsi';
        } else {
            $tanggalMasuk = $this->request->getVar('tanggalMasuk');
        }
        if ($this->request->getVar('kondisiBenda') == null) {
            $kondisiBenda = 'Belum ada deskripsi';
        } else {
            $kondisiBenda = $this->request->getVar('kondisiBenda');
        }
        if ($this->request->getVar('tempatPenyimpanan') == null) {
            $tempatPenyimpanan = 'Belum ada deskripsi';
        } else {
            $tempatPenyimpanan = $this->request->getVar('tempatPenyimpanan');
        }
        if ($this->request->getVar('dicatatOleh') == null) {
            $dicatatOleh = 'Belum ada deskripsi';
        } else {
            $dicatatOleh = $this->request->getVar('dicatatOleh');
        }
        if ($this->request->getVar('tanggal') == null) {
            $tanggal = 'Belum ada deskripsi';
        } else {
            $tanggal = $this->request->getVar('tanggal');
        }
        if ($this->request->getVar('lainnya') == null) {
            $lainnya = 'Belum ada deskripsi';
        } else {
            $lainnya = $this->request->getVar('lainnya');
        }
        if ($this->request->getVar('gambar') == null) {
            $gambar = 'Belum ada deskripsi';
        } else {
            $gambar = $this->request->getVar('gambar');
        }
    
        $this->museumModel->save([
            'namaBenda' => $namaBenda,
            'uraian' => $uraian,
            'noInvestarisLama' => $noInvestarisLama,
            'noInvestarisBaru' => $noInvestarisBaru,
            'noRegister' => $noRegister,
            'bahan' => $bahan,
            'bentuk' => $bentuk,
            'fungsi' => $fungsi,
            'ukuran' => $ukuran,
            'asalBuat' => $asalBuat,
            'asalDapat' => $asalDapat,
            'caraDapat' => $caraDapat,
            'tanggalMasuk' => $tanggalMasuk,
            'kondisiBenda' => $kondisiBenda,
            'tempatPenyimpanan' => $tempatPenyimpanan,
            'dicatatOleh' => $dicatatOleh,
            'tanggal' => $tanggal,
            'lainnya' => $lainnya,
            'gambar' => $gambar
    
        ]);
        
            $target = '/DataMuseum';
        
        session()->setFlashData('pesan', 'Data berhasil diedit');
        return redirect()->to($target);
    }
}
