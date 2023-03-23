<?php

namespace App\Http\Controllers;

use App\Repositories\CreativeIdea\CreativeIdeaRepository;
use App\Repositories\CreativeIdeaStudent\CreativeIdeaStudentRepository;

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
        return view('creative_idea.view',[
            'creativeidea' => $creativeidea,
            'listStudent' => $listStudent,
        ]);
    }
}
