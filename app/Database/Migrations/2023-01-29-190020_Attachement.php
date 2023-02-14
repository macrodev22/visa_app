<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Attachement extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'applicant_id' => [
                'type' => 'INT'
            ],
            // 'requirement_id' => [
            //     'type' => 'INT'
            // ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 60,
                'null' => true
            ],
            'attachment_path' => [
                'type' => 'VARCHAR',
                'constraint' => 300,
                'null' => true
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('applicant_id', 'applicant', 'id', 'CASCADE', 'CASCADE', 'applicantid_fk');
        // $this->forge->addForeignKey('requirement_id', 'requirement', 'id', '', '', 'requirementid_fk');
        $this->forge->createTable('attachment');
    }

    public function down()
    {
        //
        $this->forge->dropTable('attachment');
    }
}
