<?php

namespace App\Models;

use CodeIgniter\Model;

class DataDokumenModel extends Model
{
    protected $table = 'dokumen';
    protected $primarykey = 'id';
    protected $allowedFields = ['nama', 'file'];
    public function getGallery()
    {
        return $this->findAll();
    }

    public function getGalleryById($id)
    {
        return $this->where('id', $id)->findAll();
    }
}
