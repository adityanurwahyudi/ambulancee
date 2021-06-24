<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = "booking";
    protected $primaryKey = "id_booking";
    protected $returnType = "object";
    protected $allowedFields = ['id_booking', 'nama', 'telepon', 'tanggal', 'kategori', 'pesan','alamat', 'status' ];
}