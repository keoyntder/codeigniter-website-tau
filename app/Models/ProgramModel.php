<?php
namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $table         = 'programs';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['college_id', 'degree', 'title', 'sort_order'];
    protected $useTimestamps = true;

    public function forCollege(int $collegeId)
    {
        return $this->where('college_id', $collegeId)
                    ->orderBy('sort_order', 'ASC')
                    ->findAll();
    }
}