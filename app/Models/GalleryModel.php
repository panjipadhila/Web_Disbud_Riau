<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'news';
    protected $primarykey = 'id';
    protected $allowedFields = ['judul', 'isi', 'created_at', 'foto', 'penulis'];
    public function getGallery()
    {
        return $this->findAll();
    }

    public function getGalleryById($id)
    {
        return $this->where('id', $id)->findAll();
    }
}
