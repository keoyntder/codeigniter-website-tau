<?php

namespace App\Models;

use CodeIgniter\Model;

class ResearchModel extends Model
{
    protected $table            = 'research';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'title', 
        'category', 
        'description', 
        'image', 
        'overlay_badge', 
        'overlay_title', 
        'overlay_desc'
    ];
    protected $useTimestamps    = true;
}