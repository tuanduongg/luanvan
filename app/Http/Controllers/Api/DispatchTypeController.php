<?php

namespace App\Http\Controllers\Api;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\DispatchType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
class DispatchTypeController extends Controller
{
    use ResponseTrait;

    private $model;
    public function __construct(DispatchType $dispatchType)
    {
        $this->model = $dispatchType;
    }
    public function getAll() {
        $data = $this->model->all();
        return $this->responseSuccess($data);
    }

    public function find(Request $request) {
        $data = $this->model->findOrFail($request->input('id'));
        return $this->responseSuccess($data);
    }

    public function store(Request $request) {
        $rules = [
            'type_code' => 'required|unique:dispatch_types',
            'type_name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // return response()->json([
            //     'message' => $validator->errors(),
            //     'status_code' => 400,
            // ]);
            return $this->responseError($validator->errors());
        }
        // dd($request->all());
        $this->model->create($request->all());
        // return response()->json([
        //     'message' => 'Thêm mới thành công!',
        //     'status_code' => 200,
        // ]);
        return $this->responseSuccess(null,'Thêm mới thành công!');
    }
    public function update(Request $request) {
        $rules = [
            'type_code' => ['required', Rule::unique('dispatch_types')->ignore($request->get('id'))],
            'type_name' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }
        // dd($request->all());
        $dispatchType = $this->model->find($request->get('id'));
        $dispatchType->type_code = $request->get('type_code');
        $dispatchType->type_name = $request->get('type_name');
        $dispatchType->save();
        return $this->responseSuccess('','Thay đổi thông tin thành công!');
    }

    public function distroy(Request $request) {
        $dispatchType = $this->model->findOrFail($request->get('id'));
        $dispatchType->delete();
        return $this->responseSuccess('','Xoá thành công!');
    }
}
