<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Crew extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_crew'          => [
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
			'created_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			]
		]);
		$this->forge->addPrimaryKey('id_crew');
		$this->forge->createTable('crew');
	}

	public function down()
	{
		$this->forge->dropTable('crew');
	}
}
