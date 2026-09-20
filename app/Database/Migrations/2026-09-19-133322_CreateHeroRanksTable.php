<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHeroRanksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'label'      => ['type' => 'VARCHAR', 'constraint' => 100],
            'badge'      => ['type' => 'VARCHAR', 'constraint' => 150],
            'title'      => ['type' => 'VARCHAR', 'constraint' => 150],
            'text'       => ['type' => 'TEXT'],
            'url'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'icon'       => ['type' => 'VARCHAR', 'constraint' => 30, 'default' => 'trending'],
            'sort_order' => ['type' => 'TINYINT', 'constraint' => 3, 'default' => 0],
            'is_active'  => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('hero_ranks');
    }

    public function down()
    {
        $this->forge->dropTable('hero_ranks');
    }
}