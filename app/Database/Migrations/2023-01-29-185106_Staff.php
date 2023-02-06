<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Staff extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'role' => [
                'type' => 'ENUM',
                'constraint' => ['Officer', 'Manager', 'Admin'],
                'default' => 'Officer'
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 60
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 60
            ],
            'profile_picture' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
                'null' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 300
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('staff');
    }

    public function down()
    {
        //
        $this->forge->dropTable('staff');
    }
}
