<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJob;
use App\Models\Dispatche;
use App\Models\DispatchType;
use App\Repositories\Dispatche\DispatcheRepository;
use App\Repositories\DispatchType\DispatchTypeRepository;
use App\Repositories\Lecturer\LecturerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class DispatcheController extends Controller
{
    private $repository;
    private $dispatch_types;
    private $listDates = [
        'created_at' => 'Mới nhất',
        'issued_date' => 'Ngày ban hành',
        'effective_date' => 'Ngày hiệu lực',
        'expiration_date' => 'Ngày hết hiệu lực',
    ];
    public function __construct(DispatcheRepository $dispatchRepository)
    {
        $this->repository = $dispatchRepository;
        $this->dispatch_types = (new DispatchTypeRepository())->getAll();
    }
    public function index()
    {

        return view('dispatche.receive.index', [
            'tittlePage' => '- Công Văn Đến',
            'dispatch_types' =>  $this->dispatch_types,
            'listDates' =>  $this->listDates,
        ]);
    }

    public function show($id)
    {
        $dispatche = $this->repository->findById($id);
        if (empty($dispatche)) {
            abort(404);
        }
        $tittlePage = ' - Công Văn Đến | ' . Str::slug($dispatche->tittle);
        return view('dispatche.receive.view', [
            'dispatche' => $dispatche,
            'tittlePage' => $tittlePage,
        ]);
    }

    public function dispatcheSend()
    {
        return view('dispatche.send.index', [
            'tittlePage' => '- Công Văn Đi',
            'dispatch_types' =>  $this->dispatch_types,
            'listDates' =>  $this->listDates,
        ]);
    }

    public function dispatcheSendShow($id)
    {
        $dispatche = $this->repository->findById($id);
        if (empty($dispatche)) {
            abort(404);
        }
        $tittlePage = ' - Công Văn Đi | ' . Str::slug($dispatche->tittle);
        return view('dispatche.send.view', [
            'dispatche' => $dispatche,
            'tittlePage' => $tittlePage,
        ]);
    }

    
}
