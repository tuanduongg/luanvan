<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LecturerController extends Controller
{
    use ResponseTrait;

    private $model;
    public function __construct(Lecturer $lecturer)
    {
        $this->model = $lecturer;
    }
    public function getAll(Request $request)
    {
        $data = $this->model->orderBy('created_at', 'DESC')->paginate(10)->onEachSide(1);
        return $this->responseSuccess($data);
    }

    public function find(Request $request)
    {
        $data = $this->model->findOrFail($request->input('id'));
        return $this->responseSuccess($data);
    }

    public function store(Request $request)
    {
        $rules = [
            'code' => 'required|unique:lecturers',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'role' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }
        $this->model->create($request->all());
        return $this->responseSuccess(null, 'Thêm mới thành công!');
    }
    public function update(Request $request)
    {
        $rules = [
            'code' => ['required', Rule::unique('lecturers')->ignore($request->get('id'))],
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }
        // dd($request->all());
        $student = $this->model->find($request->get('id'));
        $student->code = $request->get('code');
        $student->name = $request->get('name');
        $student->email = $request->get('email');
        $student->phone = $request->get('phone');
        $student->role = $request->get('role');

        if(!empty($request->get('password'))) { //nếu có password mới thì cập nhật lại
            $student->password = $request->get('password');
        }

        $student->save();
        return $this->responseSuccess('', 'Thay đổi thông tin thành công!');
    }

    public function distroy(Request $request)
    {
        $student = $this->model->findOrFail($request->get('id'));
        $student->delete();
        return $this->responseSuccess('', 'Xoá thành công!');
    }
    public function filter(Request $request)
    {
        $name = $request->get('search');
        $data = [];
        if ( !empty($name)) {
            $query = $this->model
                ->where(
                    'name',
                    'like',
                    '%' . $name . '%',
                );
            $data = $query
                ->paginate(10)
                ->onEachSide(1);
        } else {
            $data = $this->model->paginate(10)->onEachSide(1);
        }
        return $this->responseSuccess($data);
    }

    public function selectTwo(Request $request) {
        // $request->get('student_name');
        // if(!empty($request->get('student_name'))) {

            $data = $this->model::query()
            // ->where('student_name','like','%' . $request->get('student_name').'%')
            ->select(['code','name'])
            ->get();
            return $this->responseSuccess($data);
        // }
        // return; 
    }
}
