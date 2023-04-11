<?php

namespace App\Http\Controllers;

use App\Repositories\CreativeIdea\CreativeIdeaRepository;
use App\Repositories\CreativeIdeaStudent\CreativeIdeaStudentRepository;
use Illuminate\Support\Str;

class CreativeIdeaController extends Controller
{
    private $repository;
    public function __construct(CreativeIdeaRepository $respository)
    {
        $this->repository = $respository;
    }
    public function show($id) {
        $creativeidea = $this->repository->findById($id);
        if(empty($creativeidea)) {
            abort(404);
        }
        $listStudent = (new CreativeIdeaStudentRepository())->getStudentsByIdCreativeIdea($id);
        $tittlePage = ' - Ý Tưởng Sáng Tạo Khởi Nghiệp | ' . Str::slug($creativeidea->tittle);
        return view('creative_idea.view',[
            'creativeidea' => $creativeidea,
            'listStudent' => $listStudent,
            'tittlePage' => $tittlePage,
        ]);
    }
}
