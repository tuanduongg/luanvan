<?php

namespace App\Http\Controllers;

use App\Models\DispatchType;
use App\Repositories\Dispatche\DispatcheRepository;
use App\Repositories\DispatchType\DispatchTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DispatcheController extends Controller
{
    private $repository;
    private $dispatch_types;
    private $listDates = [
        'created_at' => 'Ngày tạo',
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
        return view('dispatche.receive.view', [
            'dispatche' => $dispatche,
        ]);
    }

    public function dispatcheSend() {
        return view('dispatche.send.index', [
            'tittlePage' => '- Công Văn Đi',
            'dispatch_types' =>  $this->dispatch_types,
            'listDates' =>  $this->listDates,
        ]);
    }

    public function dispatcheSendShow($id) {
        $dispatche = $this->repository->findById($id);
        if (empty($dispatche)) {
            abort(404);
        }
        return view('dispatche.send.view', [
            'dispatche' => $dispatche,
        ]);
    }

    public function testMail() {
        // dd($_ENV['key'] = 'value');
        Mail::send('email.index',['name'=>'this is my test name'],function($mail) {
            $mail->to('sv.19103100193@uneti.edu.vn','thảo chó');
            $mail->subject('thảo chó');
        });
    }
}
