<?php

namespace App\Repositories\StudentResearchStudent;

use App\Models\Student;
use App\Models\StudentResearchStudent;
use App\Models\ThesesStudent;
use App\Repositories\BaseRepository;

class StudentResearchStudentRepository extends BaseRepository
{

    private $model;

    public function __construct()
    {
        $this->model = new StudentResearchStudent();
    }

    public function createModel($data = [])
    {
        $this->model::query()->create($data);
    }

    public function deleteByIdStudenResearch($id)
    {
        $this->model::query()
            ->where('student_research_id', $id)->delete();
    }

    public function updateByIdStudentResearch($id, $idStudents = [])
    {
        $this->deleteByIdStudenResearch($id);
        foreach ($idStudents as  $idStudent) {
            $this->createModel([
                'student_research_id' => $id,
                'student_id' => $idStudent            
            ]);
        }
    }
    public function getStudentsByIdStudentResearch($id) {
        $data = Student::whereIn('id',  function($query) use ($id) {
            $query->select('student_id')
            ->from(with(new $this->model)->getTable())
            ->where('student_research_id', $id);
        })->get();
        return $data;
    }

    
}
