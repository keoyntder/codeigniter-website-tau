<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CollegeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['code' => 'coed', 'name' => 'College of Education',                 'short_name' => 'Education',                 'logo' => 'coed.png',    'sort_order' => 1],
            ['code' => 'cbm',  'name' => 'College of Business and Management',   'short_name' => 'Business and Management',   'logo' => 'cbm2.png',    'sort_order' => 2],
            ['code' => 'cvm',  'name' => 'College of Veterinary Medicine',       'short_name' => 'Veterinary Medicine',       'logo' => 'cvm.png',     'sort_order' => 3],
            ['code' => 'caf',  'name' => 'College of Agriculture and Forestry',  'short_name' => 'Agriculture and Forestry',  'logo' => 'caf.png',     'sort_order' => 4],
            ['code' => 'cet',  'name' => 'College of Engineering and Technology','short_name' => 'Engineering and Technology','logo' => 'cetlogo.png', 'sort_order' => 5],
            ['code' => 'cas',  'name' => 'College of Arts and Sciences',         'short_name' => 'Arts and Sciences',         'logo' => 'cas2.png',    'sort_order' => 6],
        ];

        // Clear old rows so re-running the seeder doesn't create duplicates
        $this->db->table('colleges')->emptyTable();

        foreach ($data as $row) {
            $row['created_at'] = date('Y-m-d H:i:s');
            $row['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('colleges')->insert($row);
        }
    }
}