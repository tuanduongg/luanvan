<?php

namespace App\Repositories\ThesesStudent;

use App\Models\Student;
use App\Models\ThesesStudent;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class ThesesStudentRepository extends BaseRepository
{

    private $model;

    public function __construct()
    {
        $this->model = new ThesesStudent();
    }

    public function createModel($data = [])
    {
        $this->model::query()->create($data);
    }

    public function deleteByIdTheses($idTheses)
    {
        $this->model::query()
            ->where('theses_id', $idTheses)->delete();
    }

    public function updateByIdTheses($idTheses, $idStudents = [])
    {
        $this->deleteByIdTheses($idTheses);
        foreach ($idStudents as  $idStudent) {
            $this->createModel([
                'theses_id' => $idTheses,
                'student_id' => $idStudent            
            ]);
        }
    }
    public function getStudentsByIdTheses($idTheses) {
        $data = Student::whereIn('id',  function($query) use ($idTheses) {
            $query->select('student_id')
            ->from(with(new $this->model)->getTable())
            ->where('theses_id', $idTheses);
        })->get();
        return $data;
    }

    public function storeMultiple($data) {
        return $this->model::query()->insert($data);
    }
    
}
