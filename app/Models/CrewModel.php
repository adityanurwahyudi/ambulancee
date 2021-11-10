<?php

namespace App\Models;

use CodeIgniter\Model;

class CrewModel extends Model
{
    
	public function PilihBlog($id)
    {
         $query = $this->getWhere(['id_crew' => $id]);
         return $query;
    }
    public function edit_data($id,$data)
    {
        $query = $this->db->table($this->table)->update($data, array('id_crew' => $id));
        return $query;
    }


	protected $DBGroup              = 'default';
	protected $table                = 'crew';
	protected $primaryKey           = 'id_crew';
	protected $returnType           = 'object';
	protected $useTimestamps = true;
	protected $allowedFields        = ['id_crew', 'nama', 'gambar'];
}
