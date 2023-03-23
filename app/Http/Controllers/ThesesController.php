<?php

namespace App\Http\Controllers;

use App\Repositories\Theses\ThesesRepository;
use App\Repositories\ThesesStudent\ThesesStudentRepository;
use Illuminate\Http\Request;

class ThesesController extends Controller
{
    private $repository;
    public function __construct(ThesesRepository $thesesRepository)
    {
        $this->repository = $thesesRepository;
    }
    public function show($id) {
        $theses = $this->repository->findById($id);
        if(empty($theses)) {
            abort(404);
        }
        $listStudent = (new ThesesStudentRepository())->getStudentsByIdTheses($id);
        return view('theses.view',[
            'theses' => $theses,
            'listStudent' => $listStudent,
        ]);
    }
}
