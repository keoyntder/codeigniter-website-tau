<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroRankModel extends Model
{
    protected $table         = 'hero_ranks';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['label', 'badge', 'title', 'text', 'url', 'icon', 'sort_order', 'is_active'];
}