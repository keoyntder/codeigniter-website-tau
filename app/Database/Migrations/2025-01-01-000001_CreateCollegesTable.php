<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCollegesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'code'       => ['type' => 'VARCHAR', 'constraint' => 20, 'unique' => true],
            'name'       => ['type' => 'VARCHAR', 'constraint' => 150],
            'short_name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'logo'       => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'sort_order' => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('colleges');
    }

    public function down()
    {
        $this->forge->dropTable('colleges');
    }
}