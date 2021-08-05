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
        $this->numismatikaModel = new DataNumismatikaModel();
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
        } else if ($file['foto'] == null) {
            $this->galleryModel->delete($id);
            session()->setFlashData('pesan', 'Gallery berhasil dihapus');
            return redirect()->to('/news');
        } else {
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


        if ($this->request->getFile('gambar') == null) {
            $gambar = 'image-not-found.svg';
        } else {
            $filefoto = $this->request->getFile("gambar");
            $gambar = $filefoto->getRandomName();
            $filefoto->move('assets/museum-images', $gambar);
        }

        if ($this->request->getVar('namaBenda') == null) {
            $namaBenda = 'Tidak diketahui';
        } else {
            $namaBenda = $this->request->getVar('namaBenda');
        }
        if ($this->request->getVar('uraian') == null) {
            $uraian = 'Belum ada uraian';
        } else {
            $uraian = $this->request->getVar('uraian');
        }
        if ($this->request->getVar('noInventarisLama') == null) {
            $noInvestarisLama = '-';
        } else {
            $noInvestarisLama = $this->request->getVar('noInventarisLama');
        }
        if ($this->request->getVar('noInventarisBaru') == null) {
            $noInvestarisBaru = '-';
        } else {
            $noInvestarisBaru = $this->request->getVar('noInventarisBaru');
        }
        if ($this->request->getVar('noRegister') == null) {
            $noRegister = '-';
        } else {
            $noRegister = $this->request->getVar('noRegister');
        }
        if ($this->request->getVar('bahan') == null) {
            $bahan = '-';
        } else {
            $bahan = $this->request->getVar('bahan');
        }
        if ($this->request->getVar('bentuk') == null) {
            $bentuk = '-';
        } else {
            $bentuk = $this->request->getVar('bentuk');
        }
        if ($this->request->getVar('fungsi') == null) {
            $fungsi = '-';
        } else {
            $fungsi = $this->request->getVar('fungsi');
        }
        if ($this->request->getVar('ukuran') == null) {
            $ukuran = '-';
        } else {
            $ukuran = $this->request->getVar('ukuran');
        }
        if ($this->request->getVar('asalBuat') == 'Pilih Asal') {
            $asalBuat = 'Tidak diketahui';
        } else {
            $asalBuat = $this->request->getVar('asalBuat');
        }
        if ($this->request->getVar('asalDapat') == 'Pilih Asal') {
            $asalDapat = 'Tidak diketahui';
        } else {
            $asalDapat = $this->request->getVar('asalDapat');
        }
        if ($this->request->getVar('caraDapat') == null) {
            $caraDapat = '-';
        } else {
            $caraDapat = $this->request->getVar('caraDapat');
        }
        if ($this->request->getVar('tanggalMasuk') == null) {
            $tanggalMasuk = '-';
        } else {
            $tanggalMasuk = $this->request->getVar('tanggalMasuk');
        }
        if ($this->request->getVar('kondisiBenda') == null) {
            $kondisiBenda = '-';
        } else {
            $kondisiBenda = $this->request->getVar('kondisiBenda');
        }
        if ($this->request->getVar('tempatPenyimpanan') == null) {
            $tempatPenyimpanan = '-';
        } else {
            $tempatPenyimpanan = $this->request->getVar('tempatPenyimpanan');
        }
        if ($this->request->getVar('dicatatOleh') == null) {
            $dicatatOleh = '-';
        } else {
            $dicatatOleh = $this->request->getVar('dicatatOleh');
        }
        if ($this->request->getVar('tanggal') == null) {
            $tanggal = '-';
        } else {
            $tanggal = $this->request->getVar('tanggal');
        }
        if ($this->request->getVar('lainnya') == null) {
            $lainnya = '-';
        } else {
            $lainnya = $this->request->getVar('lainnya');
        }

        $this->museumModel->save([
            'namaBenda' => $namaBenda,
            'jenis' => $this->request->getVar('jenis'),
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
            if ($this->request->getFile('gambar') != null && $this->request->getFile('gambar')->isFile()) {
                $filefoto = $this->request->getFile("gambar");
                $gambar = $filefoto->getRandomName();
                $filefoto->move('assets/museum-images', $gambar);
            } else {
                $gambar = 'image-not-found.svg';
            }
        } else {
            if ($this->request->getFile('gambar') != null && $this->request->getFile('gambar')->isFile()) {
                unlink('assets/museum-images/' . $museum['gambar']);
                $filefoto = $this->request->getFile("gambar");
                $gambar = $filefoto->getRandomName();
                $filefoto->move('assets/museum-images', $gambar);
            } else {
                $gambar = $museum['gambar'];
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
            $kodeNaskah = '-';
        } else {
            $kodeNaskah = $this->request->getVar('kodeNaskah');
        }

        if ($this->request->getVar('judulNaskah') == null) {
            $judulNaskah = 'Tidak diketahui';
        } else {
            $judulNaskah = $this->request->getVar('judulNaskah');
        }
        if ($this->request->getVar('ukuranNaskah') == null) {
            $ukuranNaskah = '-';
        } else {
            $ukuranNaskah = $this->request->getVar('ukuranNaskah');
        }
        if ($this->request->getVar('watermark') == null) {
            $watermark = '-';
        } else {
            $watermark = $this->request->getVar('watermark');
        }
        if ($this->request->getVar('kondisiNaskah') == null) {
            $kondisiNaskah = '-';
        } else {
            $kondisiNaskah = $this->request->getVar('kondisiNaskah');
        }
        if ($this->request->getVar('jumlahHalaman') == null) {
            $jumlahHalaman = '-';
        } else {
            $jumlahHalaman = $this->request->getVar('jumlahHalaman');
        }
        if ($this->request->getVar('jumlahBarisPerHalaman') == null) {
            $jumlahBarisPerHalaman = '';
        } else {
            $jumlahBarisPerHalaman = $this->request->getVar('jumlahBarisPerHalaman');
        }
        if ($this->request->getVar('ilumiinasi') == null) {
            $iluminasi = '-';
        } else {
            $iluminasi = $this->request->getVar('iluminasi');
        }
        if ($this->request->getVar('aksara') == null) {
            $aksara = 'Tidak diketahui';
        } else {
            $aksara = $this->request->getVar('aksara');
        }
        if ($this->request->getVar('rubrikasi') == null) {
            $rubrikasi = '-';
        } else {
            $rubrikasi = $this->request->getVar('rubrikasi');
        }
        if ($this->request->getVar('bahasa') == null) {
            $bahasa = 'Tidak diketahui';
        } else {
            $bahasa = $this->request->getVar('bahasa');
        }
        if ($this->request->getVar('kolofon') == null) {
            $kolofon = '-';
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
            'kolofon' => $kolofon
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
        $this->NaskahModel->save([
            'id' => $id,
            'kodeNaskah' => $this->request->getVar('kodeNaskah'),
            'judulNaskah' => $this->request->getVar('judulNaskah'),
            'ukuranNaskah' => $this->request->getVar('ukuranNaskah'),
            'watermark' => $this->request->getVar('watermark'),
            'kondisiNaskah' => $this->request->getVar('kondisiNaskah'),
            'jumlahHalaman' => $this->request->getVar('jumlahHalaman'),
            'jumlahBarisPerHalaman' => $this->request->getVar('jumlahBarisPerHalaman'),
            'iluminasi' => $this->request->getVar('iluminasi'),
            'aksara' => $this->request->getVar('aksara'),
            'rubrikasi' => $this->request->getVar('rubrikasi'),
            'bahasa' => $this->request->getVar('bahasa'),
            'kolofon' => $this->request->getVar('kolofon')

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
        if ($this->request->getFile("foto") != null && $this->request->getFile('foto')->isFile()) {
            $filefoto = $this->request->getFile("foto");
            $foto = $filefoto->getRandomName();
            $filefoto->move('doc/numismatika', $foto);
        } else {
            $foto = 'image-not-found.svg';
        }

        if ($this->request->getVar('namaKoleksi') == null) {
            $namaKoleksi = 'Tidak diketahui';
        } else {
            $namaKoleksi = $this->request->getVar('namaKoleksi');
        }

        if ($this->request->getVar('noInventaris') == null) {
            $noInventaris = '-';
        } else {
            $noInventaris = $this->request->getVar('noInventaris');
        }
        if ($this->request->getVar('sisiMuka') == null) {
            $sisiMuka = 'Tidak diketahui';
        } else {
            $sisiMuka = $this->request->getVar('sisiMuka');
        }
        if ($this->request->getVar('sisiBelakang') == null) {
            $sisiBelakang = 'Tidak diketahui';
        } else {
            $sisiBelakang = $this->request->getVar('sisiBelakang');
        }
        if ($this->request->getVar('emisi') == null) {
            $emisi = '-';
        } else {
            $emisi = $this->request->getVar('emisi');
        }
        if ($this->request->getVar('seri') == null) {
            $seri = '-';
        } else {
            $seri = $this->request->getVar('seri');
        }

        if ($this->request->getVar('tandaTangan') == null) {
            $tandaTangan = '-';
        } else {
            $tandaTangan = $this->request->getVar('tandaTangan');
        }
        if ($this->request->getVar('pengaman') == null) {
            $pengaman = '-';
        } else {
            $pengaman = $this->request->getVar('pengaman');
        }
        if ($this->request->getVar('mintmaster') == null) {
            $mintmaster = '-';
        } else {
            $mintmaster = $this->request->getVar('mintmaster');
        }
        if ($this->request->getVar('mintmark') == null) {
            $mintmark = '-';
        } else {
            $mintmark = $this->request->getVar('mintmark');
        }
        if ($this->request->getVar('masaPeredaran') == null) {
            $masaPeredaran = '-';
        } else {
            $masaPeredaran = $this->request->getVar('masaPeredaran');
        }

        if ($this->request->getVar('delinavit') == null) {
            $delinavit = '-';
        } else {
            $delinavit = $this->request->getVar('delinavit');
        }

        if ($this->request->getVar('ukuran') == null) {
            $ukuran = '-';
        } else {
            $ukuran = $this->request->getVar('ukuran');
        }
        $this->numismatikaModel->save([
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
        $numismatika = $this->numismatikaModel->find($id);
        if ($numismatika['foto'] != 'image-not-found.svg') {
            unlink('assets/museum-images/' . $numismatika['foto']);
            $this->numismatikaModel->delete($id);
            session()->setFlashData('pesan', 'Data berhasil dihapus');
            return redirect()->to('NumismatikaDanHeraldika');
        } else {
            $this->numismatikaModel->delete($id);
            session()->setFlashData('pesan', 'Data berhasil dihapus');
            return redirect()->to('NumismatikaDanHeraldika');
        }
    }

    function editNumismatika($id)
    {
        $numismatika = $this->numismatikaModel->find($id);
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
        $numismatika = $this->numismatikaModel->find($id);
        if ($numismatika['foto'] == 'image-not-found.svg') {
            if ($this->request->getFile('foto') != null && $this->request->getFile('foto')->isFile()) {
                $filefoto = $this->request->getFile("foto");
                $foto = $filefoto->getRandomName();
                $filefoto->move('assets/museum-images', $foto);
            } else {
                $foto = 'image-not-found.svg';
            }
        } else {
            if ($this->request->getFile('foto') != null && $this->request->getFile('foto')->isFile()) {
                unlink('assets/museum-images/' . $numismatika['foto']);
                $filefoto = $this->request->getFile("foto");
                $foto = $filefoto->getRandomName();
                $filefoto->move('assets/museum-images', $foto);
            } else {
                $foto = $numismatika['foto'];
            }
        }

        $this->numismatikaModel->save([
            'id' => $id,
            'foto' => $foto,
            'namaKoleksi' => $this->request->getVar('namaKoleksi'),
            'noInventaris' => $this->request->getVar('noInventaris'),
            'sisiMuka' => $this->request->getVar('sisiMuka'),
            'sisiBelakang' => $this->request->getVar('sisiBelakang'),
            'emisi' => $this->request->getVar('emisi'),
            'seri' => $this->request->getVar('seri'),
            'tandaTangan' => $this->request->getVar('tandaTangan'),
            'pengaman' => $this->request->getVar('pengaman'),
            'mintmaster' => $this->request->getVar('mintmaster'),
            'mintmark' => $this->request->getVar('mintmark'),
            'masaPeredaran' => $this->request->getVar('masaPeredaran'),
            'delinavit' => $this->request->getVar('delinavit'),
            'ukuran' => $this->request->getVar('ukuran')
        ]);
        $target = 'NumismatikaDanHeraldika';
        session()->setFlashData('pesan', 'Data berhasil diedit');
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
