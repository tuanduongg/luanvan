<?php

namespace App\Http\Controllers\Api;

use App\Helpers\DateHelper;
use App\Helpers\StringHepler;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\CreativeIdea;
use App\Models\Student;
use App\Repositories\CreativeIdeaStudent\CreativeIdeaStudentRepository;
use App\Repositories\Lecturer\LecturerRepository;
use App\Repositories\Student\StudentRepository;
use App\Repositories\ThesesStudent\ThesesStudentRepository;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreativeIdeaController extends Controller
{
    use ResponseTrait;

    private $model;
    public function __construct(CreativeIdea $obj)
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
        $id = $request->get('id');

        $data = $this->model->with('lecturer:id,code')
            ->findOrFail($id); //tìm kiếm lecturer theo id


        $students = Student::query()
            ->whereIn('id', function ($query) use ($id) {
                $query->select(DB::raw('student_id'))
                    ->from('creative_idea_students')
                    ->whereRaw('creative_idea_students.creative_idea_id = ' . $id . '');
            })
            ->get(['student_code', 'student_name']); // lấy mã sv,tên sv theo từng luận văn

        // DB::raw("SELECT students.student_code FROM `students`
        // WHERE students.id in (SELECT student_id FROM `theses_students` WHERE theses_students.theses_id = " . $request->get('id') . ")");
        // $result = array_merge($data->toArray(),$students->toArray());
        $result = $data;
        $result['students'] = $students;
        return $this->responseSuccess($result);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // dd((new LecturerRepository())->getIdByCode($request->get('lecturer_id')));
        $rules = [
            // 'code' => 'required',
            'tittle' => 'required|string|max:200',
            'content' => 'required|string|max:500',
            'start_date' => 'required|date',
            // 'student_id' => 'required',
            'lecturer_id' => 'required',
            'school_year' => 'required',
            'archivist' => 'required',
            'storage_location' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }

        //validate mã sinh viên
        $arrStudentIds = StringHepler::changeFormatStudentId($request->get('student_id'));
        if (empty($arrStudentIds) ||  count($arrStudentIds) != 2) {
            return $this->responseError('', 'Bắt buộc phải thêm 2 mã sinh viên!');
        }
        //validate mã giảng viên
        $lecturerId = (new LecturerRepository())->getIdByCode($request->get('lecturer_id'));
        if (empty($lecturerId)) {
            return $this->responseError('', 'Mã giảng viên không tồn tại!');
        }

        
        $newModel = new $this->model();
        $newModel->tittle = $request->get('tittle');
        $newModel->content = $request->get('content');
        $newModel->lecturer_id = $lecturerId; // layas id giarng vien ddeer themv ao
        $newModel->start_date = $request->get('start_date');
        $newModel->school_year = $request->get('school_year');
        $newModel->archivist = $request->get('archivist');
        $newModel->storage_location = $request->get('storage_location');
        $newModel->save();
        // dd();

        // dd();


        foreach ($arrStudentIds as $item) {
            (new CreativeIdeaStudentRepository())->createModel([
                'student_id' => (new StudentRepository())->getIdByCode($item),
                'creative_idea_id' => $newModel->id,
            ]);
        }

        // $this->model->create($request->all());
        return $this->responseSuccess(null, 'Thêm mới thành công!');
    }


    public function update(Request $request)
    {
        $rules = [
            'id' => 'required',
            'tittle' => 'required|string|max:200',
            'content' => 'required|string|max:500',
            'start_date' => 'required|date',
            // 'student_id' => 'required',
            'lecturer_id' => 'required',
            'school_year' => 'required',
            'archivist' => 'required',
            'storage_location' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }

        //handle mã sinh viên
        $arrStudentIds = StringHepler::changeFormatStudentId($request->get('student_id'));
        if (empty($arrStudentIds) ||  count($arrStudentIds) != 2) {
            return $this->responseError('', 'Bắt buộc phải thêm 2 mã sinh viên!');
        }



        $lecturerId = (new LecturerRepository())->getIdByCode($request->get('lecturer_id'));
        if (empty($lecturerId)) {
            return $this->responseError('', 'Mã giảng viên không tồn tại!');
        }

        $obj = $this->model->find($request->get('id'));
        if ($obj) {
            $obj->tittle = $request->get('tittle');
            $obj->content = $request->get('content');
            $obj->start_date = $request->get('start_date');
            //handle lấy id giảng viên
            $obj->lecturer_id = $lecturerId;
            $obj->school_year = $request->get('school_year');
            $obj->archivist = $request->get('archivist');
            $obj->storage_location = $request->get('storage_location');
            
            $arrStudentId = [];
            foreach ($arrStudentIds as $item) {
                $arrStudentId[] = (new StudentRepository())->getIdByCode($item);
            }
            (new CreativeIdeaStudentRepository())->updateByIdCreativeIdea($obj->id, $arrStudentId);

            $obj->save();
            return $this->responseSuccess('', 'Thay đổi thông tin thành công!');
        }
        return $this->responseError('', 'Không tìm thấy dữ liệu!');
    }

    public function distroy(Request $request)
    {
        $student = $this->model->findOrFail($request->get('id'));
        if ($student) {
            (new CreativeIdeaStudentRepository())->deleteByIdCreativeIdea($request->get('id'));
            $student->delete();
        }
        return $this->responseSuccess('', 'Xoá thành công!');
    }
    public function filter(Request $request)
    {
        $school_year = $request->get('school_year');
        $name = $request->get('search');
        $data = [];
        $query = $this->model
            ->where(
                'tittle',
                'like',
                '%' . $name . '%',
            )
            ->orderBy('created_at', 'DESC');
        if (!empty($school_year)  || !empty($name)) {
            if ((int)$school_year != -1) {
                $query = $query->where('school_year', $school_year);
            }
            $data = $query
            
                ->paginate(10)
                ->onEachSide(1);
        } else {
            $data = $this->model->paginate(10)->onEachSide(1);
        }
        return $this->responseSuccess($data);
    }
}
