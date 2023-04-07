<?php

namespace App\Http\Controllers;

use App\Repositories\BasicResearch\BasicResearchRepository;
use App\Repositories\BasicResearchLecturer\BasicResearchLecturerRepository;
use App\Repositories\StudentResearchStudent\StudentResearchStudentRepository;

class BasicResearchController extends Controller
{
    private $repository;
    public function __construct(BasicResearchRepository $repository)
    {
        $this->repository = $repository;
    }
    public function show($id) {
        $basicresearch = $this->repository->findById($id);
        if(empty($basicresearch)) {
            abort(404);
        }
        $basicResearchLec = new BasicResearchLecturerRepository();
        $leader = $basicResearchLec->getLeaderByBasicResearch($id);
        $listLecturers = $basicResearchLec->getAllLecturerByBasicResearch($id);
        return view('basic_research.view',[
            
            'basicresearch' => $basicresearch,
            'listLecturers' => $listLecturers,
            'leader' => $leader,
        ]);
    }
}
