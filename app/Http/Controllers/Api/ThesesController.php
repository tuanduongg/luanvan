<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Theses;
use App\Models\ThesesStudent;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ThesesController extends Controller
{
    use ResponseTrait;
    private $model;
    public function __construct(Theses $obj)
    {
        $this->model = $obj;
    }

    public function getAll()
    {
        $data = $this->model->orderBy('created_at', 'DESC')->paginate(10)->onEachSide(1);
        return $this->responseSuccess($data);
    }

    public function find(Request $request)
    {
        $thesesId = $request->get('id');

        $data = $this->model->with('lecturer:id,code')
        ->findOrFail($thesesId); //tìm kiếm lecturer theo id


        $students = Student::query()
        ->whereIn('id', function($query) use($thesesId)
        {
            $query->select(DB::raw('student_id'))
                ->from('theses_students')
                ->whereRaw('theses_students.theses_id = '. $thesesId .'');
        })
        ->get('student_code'); // lấy mã sv theo từng luận văn
        
        // DB::raw("SELECT students.student_code FROM `students`
        // WHERE students.id in (SELECT student_id FROM `theses_students` WHERE theses_students.theses_id = " . $request->get('id') . ")");
        // $result = array_merge($data->toArray(),$students->toArray());
        $result = $data;
        $result['students'] = $students;
        return $this->responseSuccess($result);
    }

    public function store(Request $request)
    {
        $rules = [
            'code' => 'required',
            'tittle' => 'required',
            'content' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'student_id' => 'required',
            'lecturer_id' => 'required',
            'school_year' => 'required',
            'archivist' => 'required',
            'storage_location' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }
        dd($request->get('student_id'));
        $this->model->create($request->all());
        return $this->responseSuccess(null, 'Thêm mới thành công!');
    }
    public function update(Request $request)
    {
        $rules = [
            'code' => ['required', Rule::unique('theses')],
            'tittle' => 'required',
            'content' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'student_id' => 'required',
            'lecturer_id' => 'required',
            'school_year' => 'required',
            'archivist' => 'required',
            'storage_location' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }
        // dd($request->all());
        $obj = $this->model->find($request->get('id'));
        if($obj) {
            $obj->code = $request->get('code');
            $obj->tittle = $request->get('tittle');
            $obj->content = $request->get('content');
            $obj->start_date = $request->get('start_date');
            $obj->end_date = $request->get('end_date');
            $obj->lecturer_id = $request->get('lecturer_id');
            $obj->save();
            return $this->responseSuccess('', 'Thay đổi thông tin thành công!');
        }
        return $this->responseError('','Không tìm thấy dữ liệu!');
    }

    public function distroy(Request $request)
    {
        $student = $this->model->findOrFail($request->get('id'));
        $student->delete();
        return $this->responseSuccess('', 'Xoá thành công!');
    }
    public function filter(Request $request)
    {
        $search = $request->get('search');
        $data = [];
        if ( !empty($search)) {
            $query = $this->model
                ->where(
                    'tittle',
                    'like',
                    '%' . $search . '%',
                );
            $data = $query
                ->paginate(10)
                ->onEachSide(1);
        } else {
            $data = $this->model->paginate(10)->onEachSide(1);
        }
        return $this->responseSuccess($data);
    }

}
