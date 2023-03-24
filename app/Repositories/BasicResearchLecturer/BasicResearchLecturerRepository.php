<?php

namespace App\Repositories\BasicResearchLecturer;

use App\Models\BasicResearchLecturer;
use App\Models\Student;
use App\Models\StudentResearchStudent;
use App\Repositories\BaseRepository;

class BasicResearchLecturerRepository extends BaseRepository
{

    private $model;

    public function __construct()
    {
        $this->model = new BasicResearchLecturer();
    }

    public function createModel($data = [])
    {
        $this->model::query()->create($data);
    }

    public function deleteByIdBasicResearch($id)
    {
        $this->model::query()
            ->where('basic_research_id', $id)->delete();
    }

    public function getLeaderIdByBasicResearch($basicResearchId) {
        return $this->model::query()->where([
            ['basic_research_id','=',$basicResearchId],
            ['isLeader','=',1],
        ])
        ->get('lecturer_id')[0]->lecturer_id ?? '';
    }

    // public function updateByIdStudentResearch($id, $idStudents = [])
    // {
    //     $this->deleteByIdStudenResearch($id);
    //     foreach ($idStudents as  $idStudent) {
    //         $this->createModel([
    //             'student_research_id' => $id,
    //             'student_id' => $idStudent            
    //         ]);
    //     }
    // }
    // public function getStudentsByIdStudentResearch($id) {
    //     $data = Student::whereIn('id',  function($query) use ($id) {
    //         $query->select('student_id')
    //         ->from(with(new $this->model)->getTable())
    //         ->where('student_research_id', $id);
    //     })->get();
    //     return $data;
    // }

    
}
