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
    private $model;
    public function __construct(DispatchType $dispatchType)
    {
        $this->model = $dispatchType;
    }
    public function getAll() {
        $data = $this->model->all();
        return response()->json($data,200);
    }

    public function find(Request $request) {
        $data = $this->model->findOrFail($request->input('id'));
        return response()->json($data,200);
    }

    public function store(Request $request) {
        $rules = [
            'type_code' => 'required|unique:dispatch_types',
            'type_name' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'status_code' => 400,
            ]);
        }
        // dd($request->all());
        $this->model->create($request->all());
        return response()->json([
            'message' => 'Thêm mới thành công!',
            'status_code' => 200,
        ]);
    }
    public function update(Request $request) {
        $rules = [
            'type_code' => ['required', Rule::unique('dispatch_types')->ignore($request->get('id'))],
            'type_name' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'status_code' => 400,
            ]);
        }
        // dd($request->all());
        $dispatchType = $this->model->find($request->get('id'));
        $dispatchType->type_code = $request->get('type_code');
        $dispatchType->type_name = $request->get('type_name');
        $dispatchType->save();
        return response()->json([
            'message' => 'Thay đổi thông tin thành công!',
            'status_code' => 200,
        ]);
    }

    public function distroy(Request $request) {
        $dispatchType = $this->model->findOrFail($request->get('id'));
        $dispatchType->delete();
        return response()->json([
            'message' => 'Xoá thành công!',
            'status_code' => 200,
        ]);
    }
}
