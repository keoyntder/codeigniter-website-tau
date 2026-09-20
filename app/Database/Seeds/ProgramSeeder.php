<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $colleges = $this->db->table('colleges')->get()->getResultArray();
        $idByCode = array_column($colleges, 'id', 'code');

        $programs = [
            'coed' => [
                ['Bachelor of', 'Elementary Education'],
                ['Bachelor of', 'Secondary Education'],
                ['Bachelor of', 'Technology and Livelihood Education'],
                ['Bachelor of', 'Early Childhood Education'],
                ['Bachelor of Science in', 'Exercise and Sports Sciences'],
            ],
            'cbm' => [
                ['Bachelor of Science in', 'Tourism Management'],
                ['Bachelor of Science in', 'Entrepreneurship'],
                ['Bachelor of Science in', 'Business Administration'],
                ['Bachelor of Science in', 'Agribusiness'],
            ],
            'cet' => [
                ['Bachelor of Science in', 'Geodetic Engineering'],
                ['Bachelor of Science in', 'Information Technology'],
                ['Bachelor of Science in', 'Agricultural and Biosystems Engineering'],
            ],
            'caf' => [
                ['Bachelor of Science in', 'Agriculture'],
                ['Bachelor of', 'Animal Science'],
                ['Bachelor of Science in', 'Food Technology'],
                ['Bachelor of Science in', 'Forestry'],
            ],
            'cvm' => [
                ['Doctor of', 'Veterinary Medicine'],
            ],
            'cas' => [
                ['Bachelor of Arts in', 'Economics'],
                ['Bachelor of Science in', 'Development Communication'],
                ['Bachelor of Science in', 'Psychology'],
            ],
        ];

        foreach ($programs as $code => $rows) {
            if (! isset($idByCode[$code])) continue;

            foreach ($rows as $i => $p) {
                $this->db->table('programs')->insert([
                    'college_id' => $idByCode[$code],
                    'degree'     => $p[0],
                    'title'      => $p[1],
                    'sort_order' => $i + 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}