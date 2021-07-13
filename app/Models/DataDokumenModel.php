<?php

namespace App\Models;

use CodeIgniter\Model;

class DataDokumenModel extends Model
{
    protected $table = 'dokumen';
    protected $primarykey = 'id';
    protected $allowedFields = ['nama', 'file'];
}
