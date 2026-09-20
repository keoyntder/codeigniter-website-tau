<?php
namespace App\Models;

use CodeIgniter\Model;

class CollegeModel extends Model
{
    protected $table         = 'colleges';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['code', 'name', 'short_name', 'logo', 'sort_order'];
    protected $useTimestamps = true;

    public function withProgramCounts()
    {
        return $this->select('colleges.*, COUNT(programs.id) as program_count')
                    ->join('programs', 'programs.college_id = colleges.id', 'left')
                    ->groupBy('colleges.id')
                    ->orderBy('colleges.sort_order', 'ASC')
                    ->findAll();
    }
}