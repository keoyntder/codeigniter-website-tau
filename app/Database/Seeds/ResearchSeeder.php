<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ResearchSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'         => 'Sustainable Agricultural Innovation for Future Generations',
                'category'      => 'LATEST RESEARCH',
                'description'   => 'Tarlac Agricultural University continues to lead innovative research focused on sustainable farming, smart agriculture technologies, and community development initiatives.',
                'image'         => 'news1.png',
                'overlay_badge' => 'CAPTURED IN LENS',
                'overlay_title' => 'Gender-Responsive Planning and Budgeting Training',
                'overlay_desc'  => 'Equipping participants with skills in gender-responsive planning and budgeting.',
                'created_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'title'         => 'Smart Irrigation System for Agricultural Productivity',
                'category'      => 'TECHNOLOGY',
                'description'   => 'Exploring IoT-enabled irrigation systems to improve water efficiency.',
                'image'         => 'news1.png',
                'overlay_badge' => 'CAPTURED IN LENS',
                'overlay_title' => 'IoT Water Management',
                'overlay_desc'  => 'Real-time sensors for smart field irrigation.',
                'created_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('research')->insertBatch($data);
    }
}