<?php

namespace App\Controllers;

use \App\Models\DataOpkModel;
use App\Models\GalleryModel;
use App\Models\DataKegiatanModel;
use App\Models\DataDokumenModel;
use App\Models\DataMuseumModel;
use App\Models\AdminKabupatenModel;
use App\Models\DataNaskahModel;
use App\Models\DataNumismatikaModel;
use DateTime;

class AdminController extends BaseController
{
    protected $OpkModel;

    public function __construct()
    {
        //helper('form');
        $this->OpkModel = new DataOpkModel();
        $this->galleryModel = new GalleryModel();
        $this->kegiatanModel = new DataKegiatanModel();
        $this->dokumenModel = new DataDokumenModel();
        $this->museumModel = new DataMuseumModel();
        $this->adminModel = new AdminKabupatenModel();
        $this->NaskahModel = new DataNaskahModel();
        $this->NumismatikaModel = new DataNumismatikaModel();
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
    public function listAdmin()
    {
        // $users = $this->adminModel->getOtherAdmin($session->get('id'));
        $users = $this->adminModel->findAll();
        $data = [
            'title' => 'Deskripsi | Web Disbud Riau',
            'users' => $users
        ];
        echo view('headerWithBootstrap', $data);
        echo view('listAdmin', $data);
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
            if ($this->request->getFile('foto') == null) {
                $foto = 'image-not-found.svg';
            } else {
                $filefoto = $this->request->getFile("foto");
                $foto = $filefoto->getRandomName();
                $filefoto->move('assets/opk-images', $foto);
            }
        } else {
            if ($this->request->getFile('foto') != null && $this->request->getFile('foto')->isFile()) {
                unlink('assets/opk-images/' . $opk['foto']);
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
    function tambahKegiatan()
    {
        $data = [
            'title' => 'Tambah kegiatan'
        ];
        echo view('headerFixedTop', $data);
        echo view('tambahKegiatanView');
        echo view('footer');
    }
    function saveKegiatan()
    {
        if ($this->request->getFile("foto") == null) {
            $foto = 'image-not-found.svg';
        } else {
            $filefoto = $this->request->getFile("foto");
            $foto = $filefoto->getRandomName();
            $filefoto->move('doc/kegiatan', $foto);
        }
        $this->kegiatanModel->save([
            'nama_kegiatan' => $this->request->getVar('namaKegiatan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => $foto

        ]);
        $target = "/kegiatan";
        session()->setFlashData('pesan', 'Kegiatan berhasil diinputkan');
        return redirect()->to($target);
    }
    function deleteKegiatan($id)
    {
        $kegiatan = $this->kegiatanModel->find($id);
        if ($kegiatan['foto'] != 'image-not-found.svg') {
            unlink('doc/kegiatan/' . $kegiatan['foto']);
        }
        $this->kegiatanModel->delete($id);
        session()->setFlashData('pesan', 'Kegiatan berhasil dihapus');
        return redirect()->to('/kegiatan');
    }
    function editKegiatan($id)
    {
        $kegiatan = $this->kegiatanModel->find($id);
        $data = [
            'title' => 'Edit data',
            'kegiatan' => $kegiatan
        ];
        echo view('headerFixedTop', $data);
        echo view('editKegiatanView', $data);
        echo view('footer');
    }
    function do_editKegiatan($id)
    {
        $kegiatan = $this->kegiatanModel->find($id);
        if ($kegiatan['foto'] == 'image-not-found.svg') {
            if ($this->request->getFile('foto') == null) {
                $foto = 'image-not-found.svg';
            } else {
                $filefoto = $this->request->getFile("foto");
                $foto = $filefoto->getRandomName();
                $filefoto->move('doc/kegiatan', $foto);
            }
        } else {
            if ($this->request->getFile('foto') != null && $this->request->getFile('foto')->isFile()) {
                unlink('doc/kegiatan/' . $kegiatan['foto']);
                $filefoto = $this->request->getFile("foto");
                $foto = $filefoto->getRandomName();
                $filefoto->move('doc/kegiatan', $foto);
            } else {
                $foto = $kegiatan['foto'];
            }
        }


        if ($this->request->getVar('deskripsi') == null) {
            $deskripsi = 'Belum ada deskripsi';
        } else {
            $deskripsi = $this->request->getVar('deskripsi');
        }

        $this->kegiatanModel->save([
            'id' => $id,
            'nama_kegiatan' => $this->request->getVar('namaKegiatan'),
            'tanggal' => $this->request->getVar('tanggal'),
            'deskripsi' => $deskripsi,
            'foto' => $foto
        ]);
        $target = '/kegiatan';
        session()->setFlashData('pesan', 'Data berhasil diedit');
        return redirect()->to($target);
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
        if ($this->request->getVar('foto') == null) {
            $foto = 'image-not-found.svg';
        } else {
            $filefoto = $this->request->getFile('foto');
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
        if ($file['foto'] != 'image-not-found.svg') {
            unlink('doc/gallery/' . $file['foto']);
            $this->galleryModel->delete($id);
            session()->setFlashData('pesan', 'Gallery berhasil dihapus');
            return redirect()->to('/news');
        }else if($file['foto'] == null) {
            $this->galleryModel->delete($id);
            session()->setFlashData('pesan', 'Gallery berhasil dihapus');
            return redirect()->to('/news');
        }else{
            $this->galleryModel->delete($id);
            session()->setFlashData('pesan', 'Gallery berhasil dihapus');
            return redirect()->to('/news');
        }


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


        if ($this->request->getVar('gambar') == null) {
            $gambar = 'image-not-found.svg';
        } else {
            $filefoto = $this->request->getFile("gambar");
            $gambar = $filefoto->getRandomName();
            $filefoto->move('assets/museum-images', $gambar);
        }

        if ($this->request->getVar('jenis') == null) {
            $jenis = 'Belum ada deskripsi';
        } else {
            $jenis = $this->request->getVar('jenis');
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
            $noInvestarisLama = $this->request->getVar('noInventarisLama');
        }
        if ($this->request->getVar('noInventarisBaru') == null) {
            $noInvestarisBaru = 'Belum ada deskripsi';
        } else {
            $noInvestarisBaru = $this->request->getVar('noInventarisBaru');
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

        $this->museumModel->save([
            'namaBenda' => $namaBenda,
            'jenis' => $jenis,
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
        if ($museum['gambar'] == 'Belum ada deskripsi') {
            $this->museumModel->delete($id);
            session()->setFlashData('pesan', 'Data berhasil dihapus');
            return redirect()->to('/kategoriMuseum/' . $museum['jenis']);
        } elseif ($museum['gambar'] != 'image-not-found.svg') {
            unlink('assets/museum-images/' . $museum['gambar']);
            $this->museumModel->delete($id);
            session()->setFlashData('pesan', 'Data berhasil dihapus');
            return redirect()->to('/kategoriMuseum/' . $museum['jenis']);
        } else {
            $this->museumModel->delete($id);
            session()->setFlashData('pesan', 'Data berhasil dihapus');
            return redirect()->to('/kategoriMuseum/' . $museum['jenis']);
        }
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
            if ($this->request->getVar('gambar') == null) {
                $gambar = 'image-not-found.svg';
            } else {
                $filefoto = $this->request->getFile("gambar");
                $gambar = $filefoto->getRandomName();
                $filefoto->move('assets/museum-images', $gambar);
            }
        } else {
            if ($this->request->getVar('gambar') != null && $this->request->getFile('foto')->isFile()) {
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

        if ($this->request->getVar('jenis') == null) {
            $jenis = 'Belum ada deskripsi';
        } else {
            $jenis = $this->request->getVar('jenis');
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
            $gambar = 'image-not-found.svg';
        } else {
            $gambar = $this->request->getVar('gambar');
        }

        $this->museumModel->save([
            'id' => $id,
            'namaBenda' => $namaBenda,
            'jenis' => $jenis,
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

        $target = '/kategoriMuseum/' . $jenis;

        session()->setFlashData('pesan', 'Data berhasil diedit');
        return redirect()->to($target);
    }

    function tambahNaskah()
    {
        $data = [
            'title' => 'Tambah data'
        ];
        echo view('headerFixedTop', $data);
        echo view('TambahNaskahView');
        echo view('footer');
    }
    function saveNaskah()
    {

        if ($this->request->getVar('kodeNaskah') == null) {
            $kodeNaskah = 'Belum ada deskripsi';
        } else {
            $kodeNaskah = $this->request->getVar('kodeNaskah');
        }

        if ($this->request->getVar('judulNaskah') == null) {
            $judulNaskah = 'Belum ada deskripsi';
        } else {
            $judulNaskah = $this->request->getVar('judulNaskah');
        }
        if ($this->request->getVar('ukuranNaskah') == null) {
            $ukuranNaskah = 'Belum ada deskripsi';
        } else {
            $ukuranNaskah = $this->request->getVar('ukuranNaskah');
        }
        if ($this->request->getVar('watermark') == null) {
            $watermark = 'Belum ada deskripsi';
        } else {
            $watermark = $this->request->getVar('watermark');
        }
        if ($this->request->getVar('kondisiNaskah') == null) {
            $kondisiNaskah = 'Belum ada deskripsi';
        } else {
            $kondisiNaskah = $this->request->getVar('kondisiNaskah');
        }
        if ($this->request->getVar('jumlahHalaman') == null) {
            $jumlahHalaman = 'Belum ada deskripsi';
        } else {
            $jumlahHalaman = $this->request->getVar('jumlahHalaman');
        }
        if ($this->request->getVar('jumlahBarisPerHalaman') == null) {
            $jumlahBarisPerHalaman = 'Belum ada deskripsi';
        } else {
            $jumlahBarisPerHalaman = $this->request->getVar('jumlahBarisPerHalaman');
        }
        if ($this->request->getVar('ilumiinasi') == null) {
            $iluminasi = 'Belum ada deskripsi';
        } else {
            $iluminasi = $this->request->getVar('iluminasi');
        }
        if ($this->request->getVar('aksara') == null) {
            $aksara = 'Belum ada deskripsi';
        } else {
            $aksara = $this->request->getVar('aksara');
        }
        if ($this->request->getVar('rubrikasi') == null) {
            $rubrikasi = 'Belum ada deskripsi';
        } else {
            $rubrikasi = $this->request->getVar('rubrikasi');
        }
        if ($this->request->getVar('bahasa') == null) {
            $bahasa = 'Belum ada deskripsi';
        } else {
            $bahasa = $this->request->getVar('bahasa');
        }
        if ($this->request->getVar('kolofon') == null) {
            $kolofon = 'Belum ada deskripsi';
        } else {
            $kolofon = $this->request->getVar('kolofon');
        }


        $this->NaskahModel->save([
            'kodeNaskah' => $kodeNaskah,
            'judulNaskah' => $judulNaskah,
            'ukuranNaskah' => $ukuranNaskah,
            'watermark' => $watermark,
            'kondisiNaskah' => $kondisiNaskah,
            'jumlahHalaman' => $jumlahHalaman,
            'jumlahBarisPerHalaman' => $jumlahBarisPerHalaman,
            'iluminasi' => $iluminasi,
            'aksara' => $aksara,
            'rubrikasi' => $rubrikasi,
            'bahasa' => $bahasa,
            'kolofon' => $kolofon,


        ]);
        $target = 'Naskah';

        session()->setFlashData('pesan', 'Data berhasil diinputkan');
        return redirect()->to($target);
    }
    function deleteNaskah($id)
    {
        $this->museumModel->delete($id);
        session()->setFlashData('pesan', 'Data berhasil dihapus');
        return redirect()->to('Naskah');
    }

    function editNaskah($id)
    {
        $naskah = $this->NaskahModel->find($id);
        $data = [
            'title' => 'Edit data',
            'naskah' => $naskah
        ];
        echo view('headerFixedTop', $data);
        echo view('editDataNaskahView', $data);
        echo view('footer');
    }
    function do_editNaskah($id)
    {
        if ($this->request->getVar('kodeNaskah') == null) {
            $kodeNaskah = 'Belum ada deskripsi';
        } else {
            $kodeNaskah = $this->request->getVar('kodeNaskah');
        }

        if ($this->request->getVar('judulNaskah') == null) {
            $judulNaskah = 'Belum ada deskripsi';
        } else {
            $judulNaskah = $this->request->getVar('judulNaskah');
        }
        if ($this->request->getVar('ukuranNaskah') == null) {
            $ukuranNaskah = 'Belum ada deskripsi';
        } else {
            $ukuranNaskah = $this->request->getVar('ukuranNaskah');
        }
        if ($this->request->getVar('watermark') == null) {
            $watermark = 'Belum ada deskripsi';
        } else {
            $watermark = $this->request->getVar('watermark');
        }
        if ($this->request->getVar('kondisiNaskah') == null) {
            $kondisiNaskah = 'Belum ada deskripsi';
        } else {
            $kondisiNaskah = $this->request->getVar('kondisiNaskah');
        }
        if ($this->request->getVar('jumlahHalaman') == null) {
            $jumlahHalaman = 'Belum ada deskripsi';
        } else {
            $jumlahHalaman = $this->request->getVar('jumlahHalaman');
        }
        if ($this->request->getVar('jumlahBarisPerHalaman') == null) {
            $jumlahBarisPerHalaman = 'Belum ada deskripsi';
        } else {
            $jumlahBarisPerHalaman = $this->request->getVar('jumlahBarisPerHalaman');
        }
        if ($this->request->getVar('ilumiinasi') == null) {
            $iluminasi = 'Belum ada deskripsi';
        } else {
            $iluminasi = $this->request->getVar('iluminasi');
        }
        if ($this->request->getVar('aksara') == null) {
            $aksara = 'Belum ada deskripsi';
        } else {
            $aksara = $this->request->getVar('aksara');
        }
        if ($this->request->getVar('rubrikasi') == null) {
            $rubrikasi = 'Belum ada deskripsi';
        } else {
            $rubrikasi = $this->request->getVar('rubrikasi');
        }
        if ($this->request->getVar('bahasa') == null) {
            $bahasa = 'Belum ada deskripsi';
        } else {
            $bahasa = $this->request->getVar('bahasa');
        }
        if ($this->request->getVar('kolofon') == null) {
            $kolofon = 'Belum ada deskripsi';
        } else {
            $kolofon = $this->request->getVar('kolofon');
        }

        $this->NaskahModel->save([
            'id' => $id,
            'kodeNaskah' => $kodeNaskah,
            'judulNaskah' => $judulNaskah,
            'ukuranNaskah' => $ukuranNaskah,
            'watermark' => $watermark,
            'kondisiNaskah' => $kondisiNaskah,
            'jumlahHalaman' => $jumlahHalaman,
            'jumlahBarisPerHalaman' => $jumlahBarisPerHalaman,
            'iluminasi' => $iluminasi,
            'aksara' => $aksara,
            'rubrikasi' => $rubrikasi,
            'bahasa' => $bahasa,
            'kolofon' => $kolofon,

        ]);

        $target = 'Naskah';

        session()->setFlashData('pesan', 'Data berhasil diedit');
        return redirect()->to($target);
    }

    function tambahNumismatika()
    {
        $data = [
            'title' => 'Tambah data'
        ];
        echo view('headerFixedTop', $data);
        echo view('TambahDataNumismatika');
        echo view('footer');
    }
    function saveNumismatika()
    {
        if ($this->request->getFile("foto") == null) {
            $foto = 'image-not-found.svg';
        } else {
            $filefoto = $this->request->getFile("foto");
            $foto = $filefoto->getRandomName();
            $filefoto->move('doc/numismatika', $foto);
        }

        if ($this->request->getVar('namaKoleksi') == null) {
            $namaKoleksi = 'Belum ada deskripsi';
        } else {
            $namaKoleksi = $this->request->getVar('namaKoleksi');
        }

        if ($this->request->getVar('noInventaris') == null) {
            $noInventaris = 'Belum ada deskripsi';
        } else {
            $noInventaris = $this->request->getVar('noInventaris');
        }
        if ($this->request->getVar('sisiMuka') == null) {
            $sisiMuka = 'Belum ada deskripsi';
        } else {
            $sisiMuka = $this->request->getVar('sisiMuka');
        }
        if ($this->request->getVar('sisiBelakang') == null) {
            $sisiBelakang = 'Belum ada deskripsi';
        } else {
            $sisiBelakang = $this->request->getVar('sisiBelakang');
        }
        if ($this->request->getVar('emisi') == null) {
            $emisi = 'Belum ada deskripsi';
        } else {
            $emisi = $this->request->getVar('emisi');
        }
        if ($this->request->getVar('seri') == null) {
            $seri = 'Belum ada deskripsi';
        } else {
            $seri = $this->request->getVar('seri');
        }

        if ($this->request->getVar('tandaTangan') == null) {
            $tandaTangan = 'Belum ada deskripsi';
        } else {
            $tandaTangan = $this->request->getVar('tandaTangan');
        }
        if ($this->request->getVar('pengaman') == null) {
            $pengaman = 'Belum ada deskripsi';
        } else {
            $pengaman = $this->request->getVar('pengaman');
        }
        if ($this->request->getVar('mintmaster') == null) {
            $mintmaster = 'Belum ada deskripsi';
        } else {
            $mintmaster = $this->request->getVar('mintmaster');
        }
        if ($this->request->getVar('mintmark') == null) {
            $mintmark = 'Belum ada deskripsi';
        } else {
            $mintmark = $this->request->getVar('mintmark');
        }
        if ($this->request->getVar('masaPeredaran') == null) {
            $masaPeredaran = 'Belum ada deskripsi';
        } else {
            $masaPeredaran = $this->request->getVar('masaPeredaran');
        }

        if ($this->request->getVar('delinavit') == null) {
            $delinavit = 'Belum ada deskripsi';
        } else {
            $delinavit = $this->request->getVar('delinavit');
        }

        if ($this->request->getVar('ukuran') == null) {
            $ukuran = 'Belum ada deskripsi';
        } else {
            $ukuran = $this->request->getVar('ukuran');
        }


        $this->NumismatikaModel->save([
            'foto' => $foto,
            'namaKoleksi' => $namaKoleksi,
            'noInventaris' => $noInventaris,
            'sisiMuka' => $sisiMuka,
            'sisiBelakang' => $sisiBelakang,
            'emisi' => $emisi,
            'seri' => $seri,
            'tandaTangan' => $tandaTangan,
            'pengaman' => $pengaman,
            'mintmaster' => $mintmaster,
            'mintmark' => $mintmark,
            'masaPeredaran' => $masaPeredaran,
            'delinavit' => $delinavit,
            'ukuran' => $ukuran


        ]);
        $target = 'NumismatikaDanHeraldika';

        session()->setFlashData('pesan', 'Data berhasil diinputkan');
        return redirect()->to($target);
    }
    function deleteNumismatika($id)
    {
        $numismatika = $this->NumismatikaModel->find($id);
        if ($numismatika['foto'] != 'image-not-found.svg') {
            unlink('assets/museum-images/' . $numismatika['foto']);
            $this->NumismatikaModel->delete($id);
            session()->setFlashData('pesan', 'Data berhasil dihapus');
            return redirect()->to('NumismatikaDanHeraldika');
        } else {
            $this->NumismatikaModel->delete($id);
            session()->setFlashData('pesan', 'Data berhasil dihapus');
            return redirect()->to('NumismatikaDanHeraldika');
        }
    }

    function editNumismatika($id)
    {
        $numismatika = $this->NumismatikaModel->find($id);
        $data = [
            'title' => 'Edit data',
            'numismatika' => $numismatika
        ];
        echo view('headerFixedTop', $data);
        echo view('editNumismatika', $data);
        echo view('footer');
    }
    function do_editNumismatika($id)
    {
        if ($this->request->getFile("foto") == null) {
            $foto = 'image-not-found.svg';
        } else {
            $filefoto = $this->request->getFile("foto");
            $foto = $filefoto->getRandomName();
            $filefoto->move('doc/numismatika', $foto);
        }

        if ($this->request->getVar('namaKoleksi') == null) {
            $namaKoleksi = 'Belum ada deskripsi';
        } else {
            $namaKoleksi = $this->request->getVar('namaKoleksi');
        }

        if ($this->request->getVar('noInventaris') == null) {
            $noInventaris = 'Belum ada deskripsi';
        } else {
            $noInventaris = $this->request->getVar('noInventaris');
        }
        if ($this->request->getVar('sisiMuka') == null) {
            $sisiMuka = 'Belum ada deskripsi';
        } else {
            $sisiMuka = $this->request->getVar('sisiMuka');
        }
        if ($this->request->getVar('sisiBelakang') == null) {
            $sisiBelakang = 'Belum ada deskripsi';
        } else {
            $sisiBelakang = $this->request->getVar('sisiBelakang');
        }
        if ($this->request->getVar('emisi') == null) {
            $emisi = 'Belum ada deskripsi';
        } else {
            $emisi = $this->request->getVar('emisi');
        }
        if ($this->request->getVar('seri') == null) {
            $seri = 'Belum ada deskripsi';
        } else {
            $seri = $this->request->getVar('seri');
        }

        if ($this->request->getVar('tandaTangan') == null) {
            $tandaTangan = 'Belum ada deskripsi';
        } else {
            $tandaTangan = $this->request->getVar('tandaTangan');
        }
        if ($this->request->getVar('pengaman') == null) {
            $pengaman = 'Belum ada deskripsi';
        } else {
            $pengaman = $this->request->getVar('pengaman');
        }
        if ($this->request->getVar('mintmaster') == null) {
            $mintmaster = 'Belum ada deskripsi';
        } else {
            $mintmaster = $this->request->getVar('mintmaster');
        }
        if ($this->request->getVar('mintmark') == null) {
            $mintmark = 'Belum ada deskripsi';
        } else {
            $mintmark = $this->request->getVar('mintmark');
        }
        if ($this->request->getVar('masaPeredaran') == null) {
            $masaPeredaran = 'Belum ada deskripsi';
        } else {
            $masaPeredaran = $this->request->getVar('masaPeredaran');
        }

        if ($this->request->getVar('delinavit') == null) {
            $delinavit = 'Belum ada deskripsi';
        } else {
            $delinavit = $this->request->getVar('delinavit');
        }

        if ($this->request->getVar('ukuran') == null) {
            $ukuran = 'Belum ada deskripsi';
        } else {
            $ukuran = $this->request->getVar('ukuran');
        }


        $this->NumismatikaModel->save([
            'id' => $id,
            'foto' => $foto,
            'namaKoleksi' => $namaKoleksi,
            'noInventaris' => $noInventaris,
            'sisiMuka' => $sisiMuka,
            'sisiBelakang' => $sisiBelakang,
            'emisi' => $emisi,
            'seri' => $seri,
            'tandaTangan' => $tandaTangan,
            'pengaman' => $pengaman,
            'mintmaster' => $mintmaster,
            'mintmark' => $mintmark,
            'masaPeredaran' => $masaPeredaran,
            'delinavit' => $delinavit,
            'ukuran' => $ukuran,


        ]);
        $target = 'NumismatikaDanHeraldika';

        session()->setFlashData('pesan', 'Data berhasil diinputkan');
        return redirect()->to($target);
    }


    function deleteUsers($id)
    {
        if (user_id() != $id) {
            $this->adminModel->delete($id);
            session()->setFlashData('pesan', 'Admin berhasil dihapus');
            return redirect()->to('/listAdmin');
        } else {
            session()->setFlashData('pesan', 'Tidak bisa menghapus akun sendiri');
            return redirect()->back();
        }
    }
}
