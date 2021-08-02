<?php

namespace App\Models;

use CodeIgniter\Model;

class DataNumismatikaModel extends Model
{
    protected $table = 'numismatika';
    protected $primarykey = 'id';
    protected $allowedFields = ['namaKoleksi', 'noInventaris', 'sisiMuka', 'sisiBelakang', 'emisi', 'seri', 'foto', 'tandaTangan', 'pengaman', 'mintmaster', 'mintmark', 'masaPeredaran', 'delinavit', 'ukuran'];
}
