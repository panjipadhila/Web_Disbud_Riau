<?php

namespace App\Models;

use CodeIgniter\Model;

class DataOpkModel extends Model
{
    protected $table = 'opk';
    protected $primarykey = 'no';
    protected $allowedFields = ['nama', 'kategori', 'subkategori', 'lokasi', 'kondisi', 'deskripsi', 'foto', 'video'];
    public function getOPK()
    {
        return $this->findAll();
    }
    public function getOPKByKategori($kategori)
    {
        return $this->where('kategori', $kategori)->findAll();
    }
    public function getOPKByNo($no)
    {
        return $this->where('no', $no)->findAll();
    }
}
