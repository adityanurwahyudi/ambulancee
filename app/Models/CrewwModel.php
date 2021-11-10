<?php

namespace App\Models;

use CodeIgniter\Model;

class CrewwModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'crew';
	protected $primaryKey           = 'id_crew';
	protected $returnType           = 'object';
	protected $useTimestamps = true;
	protected $allowedFields        = ['id_crew', 'nama', 'gambar'];
}
