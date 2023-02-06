<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Application extends Migration
{
    public function up()
    {
        //
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'date_of_arrival datetime',
            'date_created datetime default current_timestamp',
            'visa_type' => [
                'type' => 'INT',
                'null' => false
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['Processing', 'Approved', 'Rejected'],
                'default' => 'Processing'
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('application');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
        $this->forge->dropTable('application');
    }
}
