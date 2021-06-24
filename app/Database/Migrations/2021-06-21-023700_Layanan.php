<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Layanan extends Migration
{
	public function up()
	{
		
		$this->forge->addField([
			'id_layanan'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'gambar'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			
			'desc'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			]
		]);
		$this->forge->addPrimaryKey('id_layanan');
		$this->forge->createTable('layanan');
	}

	public function down()
	{
		$this->forge->dropTable('layanan');
	}
}
