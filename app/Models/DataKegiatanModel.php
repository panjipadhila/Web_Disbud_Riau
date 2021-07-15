<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKegiatanModel extends Model
{
    protected $table = 'kegiatan';
    protected $primarykey = 'id';
    protected $allowedFields = ['nama_kegiatan', 'tanggal', 'deskripsi', 'foto'];
}
