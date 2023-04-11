<?php

namespace App\Repositories\Student;

use App\Models\Student;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

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

    public function getIdByCode($code)
    {
        try {

            return $this->model::query()->where('student_code', $code)->first()->id;
        } catch (\Throwable $e) {

            return null;
        }
        return null;
    }

    public function getAllId()
    {
        return $this->model::query()->get(['id', 'student_code']);
    }


    public function storeMultiple($arr)
    {
        foreach ($arr as $key => $value) {
            $code = $value['student_code'];
            $idstudent = $this->getIdByCode($code);
            if (!empty($idstudent)) { //đã có trong db
                $id[] = $idstudent;
            } else {
                $id[] = $this->model::insertGetId(
                    [
                        'student_code' => $code,
                        'student_name' => $value['student_name'],
                        'student_school_year' => $value['student_school_year'],
                        'student_class' => $value['student_class'],
                        'student_class' => $value['student_class'],
                        'student_class' => $value['student_class'],
                        'updated_at' => Carbon::now(),  // remove if not using timestamps
                        'created_at' => Carbon::now(), // remove if not using timestamps
                    ]
                );
            }
        }
        return $id;
    }
}
