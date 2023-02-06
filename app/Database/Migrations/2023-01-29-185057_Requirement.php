<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Requirement extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ],
            'mandatory' => [
                'type' => 'BOOLEAN'
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('requirement');
    }

    public function down()
    {
        //
        $this->forge->dropTable('requirement');
    }
}
