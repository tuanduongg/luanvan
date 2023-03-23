<?php

namespace App\Repositories\Student;

use App\Models\Student;
use App\Repositories\BaseRepository;

class StudentRepository extends BaseRepository
{

    private $model;

    public function __construct()
    {
        $this->model = new Student();
    }

    public function createModel($data)
    {
        $this->model::query()->create($data);
    }

    public function getIdByCode($code) {
        return $this->model::query()->where('student_code',$code)->first()->id;
    }

    public function getByIdTheses($idTheses) {
        
    }
}
