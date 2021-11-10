<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'kegiatan';
	protected $primaryKey           = 'id_kegiatan';
	protected $returnType           = 'object';
	protected $useTimestamps = true;
	protected $allowedFields        = ['id_kegiatan', 'nama','video', 'deskripsi'];
}