<?php

namespace App\Models;

use CodeIgniter\Model;

class DataOpkModel extends Model
{
    protected $table = 'opk';
    protected $primarykey = 'id';
    protected $allowedFields = ['nama', 'kategori', 'subkategori', 'lokasi', 'kondisi', 'deskripsi', 'foto', 'video'];
    public function getOPK()
    {
        return $this->findAll();
    }
    public function getOPKByKategori($kategori)
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
        return $this->where('kategori', $kategori)->findAll();
    }
    public function getOPKByNo($id)
    {
        return $this->where('id', $id)->findAll();
    }
}
