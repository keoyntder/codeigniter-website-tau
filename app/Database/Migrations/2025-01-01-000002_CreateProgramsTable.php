<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProgramsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'college_id'  => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'degree'      => ['type' => 'VARCHAR', 'constraint' => 50],   // e.g. "Bachelor of Science in"
            'title'       => ['type' => 'VARCHAR', 'constraint' => 150],  // e.g. "Information Technology"
            'sort_order'  => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('college_id', 'colleges', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('programs');
    }

    public function down()
    {
        $this->forge->dropTable('programs');
    }
}