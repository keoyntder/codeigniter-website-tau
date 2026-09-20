<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEnrollmentSchedules extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
        'program_id' => ['type' => 'INT', 'unsigned' => true],
        'term'       => ['type' => 'VARCHAR', 'constraint' => 50],
        'sched_date' => ['type' => 'DATE'],
        'session'    => ['type' => 'ENUM', 'constraint' => ['AM', 'PM']],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('program_id', 'programs', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('enrollment_schedules');
}

public function down()
{
    $this->forge->dropTable('enrollment_schedules');
}

}
