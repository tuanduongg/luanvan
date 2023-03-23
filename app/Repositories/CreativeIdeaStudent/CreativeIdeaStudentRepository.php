<?php

namespace App\Repositories\CreativeIdeaStudent;

use App\Models\CreativeIdeaStudent;
use App\Models\Student;
use App\Models\ThesesStudent;
use App\Repositories\BaseRepository;

class CreativeIdeaStudentRepository extends BaseRepository
{

    private $model;

    public function __construct()
    {
        $this->model = new CreativeIdeaStudent();
    }

    public function createModel($data = [])
    {
        $this->model::query()->create($data);
    }

    public function deleteByIdCreativeIdea($id)
    {
        $this->model::query()
            ->where('creative_idea_id', $id)->delete();
    }

    public function updateByIdCreativeIdea($idTheses, $idStudents = [])
    {
        $this->deleteByIdCreativeIdea($idTheses);
        foreach ($idStudents as  $idStudent) {
            $this->createModel([
                'creative_idea_id' => $idTheses,
                'student_id' => $idStudent            
            ]);
        }
    }
    public function getStudentsByIdCreativeIdea($id) {
        $data = Student::whereIn('id',  function($query) use ($id) {
            $query->select('student_id')
            ->from(with(new $this->model)->getTable())
            ->where('creative_idea_id', $id);
        })->get();
        return $data;
    }

    
}
