<?php

namespace App\Models;

use CodeIgniter\Model;

class DataNaskahModel extends Model
{
    protected $table = 'naskah';
    protected $primarykey = 'id';
    protected $allowedFields = ['kodeNaskah', 'judulNaskah', 'ukuranNaskah', 'watermark', 'kondisiNaskah', 'jumlahHalaman', 'jumlahBarisPerhalaman', 'iluminasi', 'aksara', 'rubrikasi', 'bahasa', 'kolofon'];
}
