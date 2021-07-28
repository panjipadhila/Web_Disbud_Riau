<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminKabupatenModel extends Model
{
    protected $table = 'users';
    protected $primarykey = 'id';

    function getDataKabupaten($lokasi)
    {
        return $this->where('lokasi', $lokasi)->findAll();
    }
}
