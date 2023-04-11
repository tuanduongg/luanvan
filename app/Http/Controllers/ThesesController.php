<?php

namespace App\Http\Controllers;

use App\Repositories\Theses\ThesesRepository;
use App\Repositories\ThesesStudent\ThesesStudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThesesController extends Controller
{
    private $repository;
    public function __construct(ThesesRepository $thesesRepository)
    {
        $this->repository = $thesesRepository;
    }

    public function index()
    {
        $allSchoolYear = (int)date("Y") - 2007 - 3;
        return view('theses.index', [
            'tittlePage' => '- Luận Văn Sinh Viên',
            'allSchoolYear' => $allSchoolYear,
        ]);
    }
    public function show($id)
    {
        $theses = $this->repository->findById($id);
        if (empty($theses)) {
            abort(404);
        }
        $listStudent = (new ThesesStudentRepository())->getStudentsByIdTheses($id);
        $tittlePage = ' - Luận Văn Sinh Viên | ' . Str::slug($theses->tittle);
        return view('theses.view', [
            'theses' => $theses,
            'listStudent' => $listStudent,
            'tittlePage' => $tittlePage,
        ]);
    }
}
