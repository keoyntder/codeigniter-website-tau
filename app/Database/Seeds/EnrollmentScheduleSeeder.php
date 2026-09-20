<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EnrollmentScheduleSeeder extends Seeder
{
    public function run()
    {
        $term = '1st Sem AY 2026-2027';

        // Lookup by full name, e.g. "Bachelor of Science in Information Technology"
        $idByName = [];
        foreach ($this->db->table('programs')->get()->getResultArray() as $p) {
            $idByName[trim($p['degree'] . ' ' . $p['title'])] = $p['id'];
        }

        $schedule = [
            '2026-06-08' => [
                'AM' => [
                    'Bachelor of Elementary Education',
                    'Bachelor of Secondary Education',
                ],
                'PM' => [
                    'Bachelor of Technology and Livelihood Education',
                    'Bachelor of Early Childhood Education',
                    'Bachelor of Science in Exercise and Sports Sciences',
                    'Doctor of Veterinary Medicine',
                ],
            ],
            '2026-06-09' => [
                'AM' => [
                    'Bachelor of Science in Geodetic Engineering',
                    'Bachelor of Science in Information Technology',
                ],
                'PM' => [
                    'Bachelor of Science in Psychology',
                    'Bachelor of Science in Tourism Management',
                    'Bachelor of Science in Forestry',
                    'Bachelor of Science in Entrepreneurship',
                ],
            ],
            '2026-06-11' => [
                'AM' => [
                    'Bachelor of Science in Business Administration',
                ],
                'PM' => [
                    'Bachelor of Science in Agribusiness',
                    'Bachelor of Science in Agriculture',
                ],
            ],
            '2026-06-15' => [
                'AM' => [
                    'Bachelor of Science in Agricultural and Biosystems Engineering',
                    'Bachelor of Arts in Economics',
                    'Bachelor of Science in Development Communication',
                ],
                'PM' => [
                    'Bachelor of Animal Science',
                    'Bachelor of Science in Food Technology',
                ],
            ],
        ];

        $this->db->table('enrollment_schedules')->where('term', $term)->delete();

        foreach ($schedule as $date => $sessions) {
            foreach ($sessions as $session => $names) {
                foreach ($names as $name) {
                    if (! isset($idByName[$name])) {
                        log_message('warning', "Schedule: program not found: {$name}");
                        continue;
                    }
                    $this->db->table('enrollment_schedules')->insert([
                        'program_id' => $idByName[$name],
                        'term'       => $term,
                        'sched_date' => $date,
                        'session'    => $session,
                    ]);
                }
            }
        }
    }
}