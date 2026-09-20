<?php
namespace App\Controllers;

use App\Models\CollegeModel;
use App\Models\ProgramModel;

class Admissions extends BaseController
{
    public function index()
    {
        $collegeModel = new CollegeModel();
        $programModel = new ProgramModel();

        $colleges = $collegeModel->orderBy('sort_order', 'ASC')->findAll();

        foreach ($colleges as &$c) {
            $rows = $programModel->forCollege($c['id']);

            // Each program: [degree, title, majors (JSON string or null)]
            $c['programs'] = array_map(
                fn($p) => [$p['degree'], $p['title'], $p['majors'] ?? null],
                $rows
            );

            $c['logo']  = $c['logo'];
            $c['short'] = $c['short_name'];
        }
        unset($c);

        // Applicant types
        $applicantTypes = [
            ['id' => 'freshmen',    'title' => 'Freshmen Students', 'text' => 'First-year students entering college for the first time.',
                'icon' => '<path d="M22 10L12 5 2 10l10 5 10-5z"/><path d="M6 12v5c3 2 9 2 12 0v-5"/>'],
            ['id' => 'returnees',   'title' => 'Returnees', 'text' => 'Former TAU students coming back after a break in their studies.',
                'icon' => '<polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"/>'],
            ['id' => 'shifters',    'title' => 'Shifters', 'text' => 'Current TAU students moving to a different degree program.',
                'icon' => '<polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/>'],
            ['id' => 'transferees', 'title' => 'Transferees', 'text' => 'Students from another school continuing their degree at TAU.',
                'icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 16 16 12 12 8"/><line x1="8" y1="12" x2="16" y2="12"/>'],
            ['id' => 'foreign',     'title' => 'Foreign Students', 'text' => 'International students applying to study at TAU.',
                'icon' => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>'],
        ];

        // Enrollment schedule
        $schedRows = db_connect()->table('enrollment_schedules es')
            ->select('es.sched_date, es.session, p.degree, p.title')
            ->join('programs p', 'p.id = es.program_id')
            ->where('es.term', '1st Sem AY 2026-2027')
            ->orderBy('es.sched_date')->orderBy('es.id')
            ->get()->getResultArray();

        $enrollSchedule = [];
        foreach ($schedRows as $r) {
            $day = (int) date('j', strtotime($r['sched_date']));
            $enrollSchedule[$day][$r['session']][] = trim($r['degree'] . ' ' . $r['title']);
        }

        $first      = $schedRows[0]['sched_date'] ?? date('Y-m-d');
        $schedYear  = (int) date('Y', strtotime($first));
        $schedMonth = (int) date('n', strtotime($first));

        return view('admissions', [
            'colleges'       => $colleges,
            'applicantTypes' => $applicantTypes,
            'enrollSchedule' => $enrollSchedule,
            'schedYear'      => $schedYear,
            'schedMonth'     => $schedMonth,
        ]);
    }

    // Individual college page, e.g. /departments/cet
    public function department(string $code)
    {
        $collegeModel = new CollegeModel();
        $programModel = new ProgramModel();

        $college = $collegeModel->where('code', $code)->first();
        if (! $college) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $programs = $programModel->forCollege($college['id']);

        return view('departments', [
            'college'  => $college,
            'programs' => $programs,
        ]);
    }
}