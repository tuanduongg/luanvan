<?php

namespace App\Http\Controllers;
use App\Repositories\StudentResearchStudent\StudentResearchStudentRepository;
use App\Repositories\StudentResearch\StudentResearchRepository;
use Illuminate\Support\Str;

class StudentResearchController extends Controller
{
    private $repository;
    public function __construct(StudentResearchRepository $repository)
    {
        $this->repository = $repository;
    }
    public function show($id) {
        $studentresearch = $this->repository->findById($id);
        if(empty($studentresearch)) {
            abort(404);
        }
        $listStudent = (new StudentResearchStudentRepository())->getStudentsByIdStudentResearch($id);
        $tittlePage = ' - Nghiên Cứu Khoa Học Sinh Viên | ' . Str::slug($studentresearch->tittle);
        return view('student_research.view',[
            'studentresearch' => $studentresearch,
            'listStudent' => $listStudent,
            'tittlePage' => $tittlePage,

        ]);
    }
}
