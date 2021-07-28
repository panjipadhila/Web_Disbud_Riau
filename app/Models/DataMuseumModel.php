<?php

namespace App\Models;

use CodeIgniter\Model;

class DataMuseumModel extends Model
{
    protected $table = 'museum';
    protected $primarykey = 'id';
    protected $allowedFields = ['namaBenda', 'uraian', 'noInventarisLama', 'noInventarisBaru', 'noRegister', 'bahan', 'bentuk', 'fungsi', 'ukuran', 'asalBuat', 'asalDapat', 'caraDapat', 'tanggalMasuk','kondisiBenda', 'tempatPenyimpanan', 'dicatatOleh', 'tanggal', 'lainnya', 'gambar'];
    public function getMuseum()
    {
        return $this->findAll();
    }
    public function getMuseumByJenis($jenis)
    {
        //$sql = 'SELECT * FROM ' . $this->table . ' WHERE kategori = ' . $kategori . ' ORDER BY ' . 'no' . ' ' . 'DESC';
        //$Sql = "SELECT * FROM `opk` WHERE `kategori` = '" . $kategori . "' ORDER BY `no` DESC";
        //$query = $this->db->query($Sql);

        //return $this->query->findAll();
        // $this->from($this->opk);
        // $this->where('opk.kategori', $kategori);
        // $this->order_by("no", "desc");
        // $query = $this->get();
        // return $query->result();
        return $this->where('jenis', $jenis)->findAll();
    }
    public function getMuseumByNo($id)
    {
        return $this->where('id', $id)->findAll();
    }
    function getOPKByKategoriLokasi($lokasi, $kategori)
    {
        return $this->where('lokasi', $lokasi)->where('kategori', $kategori)->findAll();
    }
}
