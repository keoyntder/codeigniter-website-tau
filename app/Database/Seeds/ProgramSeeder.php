<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $colleges = $this->db->table('colleges')->get()->getResultArray();
        $idByCode = array_column($colleges, 'id', 'code');

        // Each row: [degree, title, majors (optional array)]
        // Source: TAU "List of Curricular Offerings" (Undergraduate Level)
        $programs = [
            'coed' => [
                ['Bachelor of', 'Elementary Education'],
                ['Bachelor of', 'Early Childhood Education'],
                ['Bachelor of Science in', 'Exercise and Sports Sciences'],
                ['Bachelor of', 'Technology and Livelihood Education', [
                    'Home Economics',
                    'Information Communication and Technology',
                    'Agri-Fishery Arts',
                ]],
                ['Bachelor of', 'Secondary Education', [
                    'Science',
                    'Mathematics',
                ]],
            ],
            'cbm' => [
                ['Bachelor of Science in', 'Business Administration', [
                    'Human Resource Management',
                    'Financial Management',
                    'Marketing Management',
                ]],
                ['Bachelor of Science in', 'Entrepreneurship'],
                ['Bachelor of Science in', 'Tourism Management'],
                ['Bachelor of Science in', 'Agribusiness'],
            ],
            'cet' => [
                ['Bachelor of Science in', 'Agricultural and Biosystems Engineering'],
                ['Bachelor of Science in', 'Geodetic Engineering'],
                ['Bachelor of Science in', 'Information Technology'],
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
                ['Bachelor of Science in', 'Psychology'],
                ['Bachelor of Arts in', 'Economics'],
                ['Bachelor of Science in', 'Development Communication'],
            ],
        ];

        // Clear old rows so re-running the seeder doesn't create duplicates
        $this->db->table('programs')->emptyTable();

        $now = date('Y-m-d H:i:s');

        foreach ($programs as $code => $rows) {
            if (! isset($idByCode[$code])) {
                continue;
            }

            foreach ($rows as $i => $p) {
                $this->db->table('programs')->insert([
                    'college_id' => $idByCode[$code],
                    'degree'     => $p[0],
                    'title'      => $p[1],
                    'majors'     => ! empty($p[2]) ? json_encode($p[2]) : null,
                    'sort_order' => $i + 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}