<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKegiatanModel extends Model
{
    protected $table = 'kegiatan';
    protected $primarykey = 'no_kegiatan';

    public function getKegiatan()
    {
        return $this->findAll();
    }
    public function getKegiatanByNo($no)
    {
        return $this->where('no_kegiatan', $no)->findAll();
    }
}
