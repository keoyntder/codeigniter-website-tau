<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMajorsToPrograms extends Migration
{
    public function up()
    {
        $this->forge->addColumn('programs', [
            'majors' => [
                'type'  => 'TEXT',
                'null'  => true,
                'after' => 'title',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('programs', 'majors');
    }
}