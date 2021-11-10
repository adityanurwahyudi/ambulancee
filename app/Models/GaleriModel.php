<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'galeri';
	protected $primaryKey           = 'id_galeri';
	protected $returnType           = 'object';
	protected $useTimestamps = true;
	protected $allowedFields        = ['id_galeri', 'nama','gambar', 'deskripsi'];
}