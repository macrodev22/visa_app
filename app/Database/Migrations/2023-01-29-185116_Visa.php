<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Visa extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => 150
            ],
            'fees' => [
                'type' => 'INT',
                'null' => false
            ],
            'multiple_entry' => [
                'type' => 'BOOLEAN'
            ],
            'type' => [
                'type' => 'ENUM',
                'constraint' => ['Visa', 'Pass']
            ],
            'requirements' => [
                'type' => 'JSON',
                'null' => true
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('visa');
    }

    public function down()
    {
        //
        $this->forge->dropTable('visa');
    }
}
