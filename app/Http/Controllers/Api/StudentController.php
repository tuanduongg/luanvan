<?php

namespace App\Http\Controllers\Api;

use Illuminate\Validation\Rule;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use ResponseTrait;

    private $model;
    public function __construct(Student $student)
    {
        $this->model = $student;
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
            'student_code' => 'required|unique:students',
            'student_name' => 'required',
            'student_class' => 'required',
            'student_school_year' => 'required',
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
        return $this->responseSuccess(null, 'Thêm mới thành công!');
    }
    public function update(Request $request)
    {
        $rules = [
            'student_code' => ['required', Rule::unique('students')->ignore($request->get('id'))],
            'student_name' => 'required',
            'student_class' => 'required',
            'student_school_year' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }
        // dd($request->all());
        $student = $this->model->find($request->get('id'));
        $student->student_code = $request->get('student_code');
        $student->student_name = $request->get('student_name');
        $student->student_class = $request->get('student_class');
        $student->student_school_year = $request->get('student_school_year');
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
        // if ($request->has('search')) {
        //     $searchVal = $request->get('search');
        //     $data = $this->model->where('name', 'like', '%' . $searchVal . '%')->paginate(10)->onEachSide(1);
        //     return $this->responseSuccess($data);
        // }
        $student_school_year = $request->get('student_school_year');
        $name = $request->get('search');
        $data = [];
        $query = $this->model
            ->where(
                'student_name',
                'like',
                '%' . $name . '%',
            );
        if (!empty($student_school_year)  || !empty($name)) {
            if ((int)$student_school_year != -1) {
                $query = $query->where('student_school_year', $student_school_year);
            }
            $data = $query
                ->paginate(10)
                ->onEachSide(1);
        } else {
            $data = $this->model->paginate(10)->onEachSide(1);
        }
        return $this->responseSuccess($data);
    }

    public function selectTwo(Request $request) {
        $request->get('student_name');
        if(!empty($request->get('student_name'))) {

            $data = $this->model::query()
            ->where('student_name','like','%' . $request->get('student_name').'%')
            ->select(['student_code','student_name'])
            ->get();
            return $this->responseSuccess($data);
        }
        return; 
    }
}
