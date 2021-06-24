<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'layanan';
	protected $primaryKey           = 'id_layanan';
	protected $returnType           = 'object';
	protected $useTimestamps = true;
	protected $allowedFields        = ['id_layanan', 'nama','gambar', 'desc'];
}