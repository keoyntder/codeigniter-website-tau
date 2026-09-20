<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HeroRankSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'label'      => 'Rank 64 Worldwide',
                'badge'      => 'WURI 2026 · Innovation',
                'title'      => 'RANK 64 WORLDWIDE',
                'text'       => 'Tarlac Agricultural University (TAU) has made a historic leap in the 2026 World University Rankings for Innovation (WURI), climbing from 93rd to 64th place worldwide, a stunning 29-rank surge in just one year.',
                'url'        => 'https://www.facebook.com/share/p/1M26D3H7D3/',
                'icon'       => 'trending',
                'sort_order' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'label'      => 'Rank 9 PH',
                'badge'      => 'WURI 2026 · Philippines',
                'title'      => 'RANK 9 PH',
                'text'       => 'The University now stands as the 9th most innovative higher education institution (HEI) in the Philippines and also claims the top spot in Central Luzon.',
                'url'        => 'https://www.facebook.com/share/p/1M26D3H7D3/',
                'icon'       => 'award',
                'sort_order' => 2,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'label'      => '1001–1500 Global',
                'badge'      => 'THE Sustainability Impact Ratings 2026',
                'title'      => 'RANKED 1001-1500 GLOBAL',
                'text'       => 'TAU has once again reaffirmed its commitment to the global sustainability agenda, as revealed in the newly released 2026 Times Higher Education (THE) Sustainability Impact Ratings.',
                'url'        => 'https://www.facebook.com/share/p/1EAHjWm9Gp/',
                'icon'       => 'target',
                'sort_order' => 3,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('hero_ranks')->insertBatch($data);
    }
}