<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $role = $request->get('role');
        $data = $this->model->orderBy('created_at', 'DESC');
        if((int)$role == 2) {
            $data = $data->where('role','=','3');
        }
        $data = $data->paginate(10)->onEachSide(1);
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
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|max:10',
            'role' => 'required',
            'password' => 'required|min:6|max:50',
            'confirm_password' => 'required|min:6|max:50|required_with:password|same:password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }
        $data = $request->all();
        $data['password'] = Hash::make($request->get('password'));
        $this->model->create($data);
        return $this->responseSuccess(null, 'Thêm mới thành công!');
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $rules = [
            'code' => ['required', Rule::unique('lecturers')->ignore($request->get('id'))],
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|min:10|max:10',
            'role' => 'required',
        ];
        if($request->has('password') && !empty($request->get('password'))) {
            $rules['password'] ='required|min:6|max:50';
        }

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
            $student->password = Hash::make($request->get('password'));
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
        $role = $request->get('role');
        $data = [];
        if ( !empty($name)) {
            $query = $this->model
            ->where(
                'name',
                'like',
                '%' . $name . '%',
            );
            if((int)$role == 2) {
                $data = $query->where('role','=','3');
            }
            $data = $query
                ->paginate(10)
                ->onEachSide(1);
        } else {
            if((int)$role == 2) {
                $data = $data = $this->model->where('role','=','3')->paginate(10)->onEachSide(1);
            }else {

                $data = $this->model->paginate(10)->onEachSide(1);
            }
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

    public function getAllName() {
        $data = $this->model::query()->get(['id','name','code']);
        return $this->responseSuccess($data);
    }
}
