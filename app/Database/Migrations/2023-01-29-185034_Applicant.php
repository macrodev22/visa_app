<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Applicant extends Migration
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
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'middle_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'surname' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'date_of_birth date',
            'nationality' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'gender' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'marital_status' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'passport_number' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true
            ],
            'passport_expiry date',
            'father_name' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'mother_name' => [
                'type' => 'VARCHAR',
                'constraint' => 200
            ],
            'place_of_birth' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 300
            ],
            'passport_path' => [
                'type' => 'VARCHAR',
                'constraint' => 300
            ],            
            'photo_path' => [
                'type' => 'VARCHAR',
                'constraint' => 300
            ],
            'application_id' => [
                'type' => 'INT',
                'null' => true
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('application_id', 'application', 'id', '', '', 'applicationid_fk');
        $this->forge->createTable('applicant');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        //
        $this->forge->dropTable('applicant');
    }
}
