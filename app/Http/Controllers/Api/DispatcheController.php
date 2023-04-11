<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Dispatche\DispatcheRepository;
use App\Repositories\DispatchType\DispatchTypeRepository;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class DispatcheController extends Controller
{
    use ResponseTrait;
    private $repository;
    public function __construct(DispatcheRepository $dispatcheRepository)
    {
        $this->repository = $dispatcheRepository;
    }


    public function getAll($type)
    {
        $data = $this->repository->getData($type);

        return $this->responseSuccess($data);
    }

    public function find(Request $request)
    {
        $id = $request->get('id');
        $result = $this->repository->findById($id);
        if (empty($result)) {
            return $this->responseError('', 'Không có dữ liệu!');
        }
        return $this->responseSuccess($result);
    }


    public function store(Request $request)
    {
        // dd($request->get('lecturer_id'));

        $rules = [
            'code' => 'required|unique:dispatches,code',
            'tittle' => 'required|string|max:200',
            'content' => 'required|string|max:500',
            'type_id' => 'exists:dispatch_types,id',
            'signer' => 'required|max:50',
            'sign_date' => 'required|date',
            'issued_date' => 'required|date',
            'published_place' => 'required|string|max:100',
            'effective_date' => 'required|date|after_or_equal:issued_date',
            'expiration_date' => 'required|date|after_or_equal:effective_date',
            'storage_location' => 'required|string|max:100',
            'archivist' => 'required|max:50',
            'file' => 'file|max:10240|mimes:doc,docx,pdf,jpg,png',
        ];
        if ((int)$request->get('role') == 2) {
            $rules['receiver'] = 'required|max:50';
        }
        $data = $request->all();
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }

        $this->repository->create($request->all());

        return $this->responseSuccess(null, 'Thêm mới thành công!');
    }


    public function update(Request $request)
    {
        $rules = [
            'id' => 'required',
            'code' => ['required', Rule::unique('dispatches')->ignore($request->get('id'))],
            'tittle' => 'required|string|max:200',
            'content' => 'required|string|max:500',
            'type_id' => 'exists:dispatch_types,id',
            'signer' => 'required|max:50',
            'sign_date' => 'required|date',
            'issued_date' => 'required|date',
            'published_place' => 'required|string|max:100',
            'effective_date' => 'required|date|after_or_equal:issued_date',
            'expiration_date' => 'required|date|after_or_equal:effective_date',
            'storage_location' => 'required|string|max:100',
            'archivist' => 'required|max:50',
            'file' => 'file|max:10240|mimes:doc,docx,pdf,jpg,png',
        ];
        if ($request->get('role') == 2) {
            $rules['receiver'] = 'required|max:50';
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }
        $data = $request->all();
        $data['role'] = $request->get('role'); //công văn đến
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nameFile = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads\storage'), $nameFile);
            $data['file'] = $nameFile;
        }
        $isUpdate = $this->repository->update($request->get('id'), $data);
        if (!empty($isUpdate)) {
            return $this->responseSuccess('', 'Thay đổi thông tin thành công!');
        }
        return $this->responseError('', 'Không tìm thấy dữ liệu!');
    }

    public function distroy(Request $request)
    {
        $dispatche = $this->repository->delete($request->get('id'));
        if (!empty($dispatche)) {
            return $this->responseSuccess('', 'Xoá thành công!');
        }
        return $this->responseError('', 'Không tìm thấy dữ liệu!');
    }
    public function filter($type, Request $request)
    {
        $year = $request->get('year');
        $tittle = $request->get('search');
        $month = $request->get('month');
        $date = $request->get('date');
        $type_id = $request->get('type_id');
        $data = $this->repository->getData($type, [
            'year' => $year,
            'tittle' => $tittle,
            'month' => $month,
            'date' => $date,
            'type_id' => $type_id,
        ]);
        return $this->responseSuccess($data);
    }

    public function getAllCode()
    {
        $data = $this->repository->getCodes();
        return $this->responseSuccess($data);
    }

    public function checkCodeExist(Request $request, $type)
    {
        $code = $request->get('code');
        $data = $this->repository->findByCode($code, $type);
        return $this->responseSuccess($data);
    }

    public function storeMultiple(Request $request, $type)
    {
        $arrNewKey = [
            'code',
            'tittle',
            'content',
            'type_id',
            'receiver',
            'signer',
            'sign_date',
            'issued_date',
            'published_place',
            'effective_date',
            'expiration_date',
            'archivist',
            'storage_location',
        ];

        if((int)$type == 1) {
            array_splice($arrNewKey,4,1);
        }
        $data = $request->get('data');
        // dd($data);
        $result = [];
        foreach ($data as $key => $item) {
            foreach ($item as $index => $value) {
                if($arrNewKey[$index] == 'type_id') {

                    $item[$arrNewKey[$index]] = $this->getTypeIdByName($item[$index]);
                }else {
                    $item[$arrNewKey[$index]] = $item[$index];
                }
                unset($item[$index]);
            }
            $item['role'] = $type;
            $item['updated_at'] = Carbon::now();;  // remove if not using timestamps
            $item['created_at'] = Carbon::now();;  // remove if not using timestamps
            $result[] = $item;
        }
        
        // dd($result);
        try {
            $this->repository->createMultiple($result);
            return $this->responseSuccess($result,'Tạo mới thành công!');
        } catch (\Throwable $e) {
            return $this->responseError('','Lỗi truy vấn dữ liệu!');
        }
    }

    public function getTypeIdByName($name) {
        $arr = (new DispatchTypeRepository())->getAll();
        $id = '';
        foreach ($arr as $item) {
            if(str_contains($item->type_name,$name)) {
                $id = $item->id;
                break;
            };   
        }
        if($id === '') {
            $id = (new DispatchTypeRepository())->createByName($name);

        }

        return $id;
    }

    public function getDispatcheReceiveByWeek() {
        $data = $this->repository->getByWeek(1); //1 là đến 2 đi
        return $this->responseSuccess($data);
    }
}
