<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\StringHepler;
use App\Helpers\DateHelper;
use App\Models\Student;
use App\Models\StudentResearch;
use App\Repositories\Lecturer\LecturerRepository;
use App\Repositories\Student\StudentRepository;
use App\Repositories\StudentResearchStudent\StudentResearchStudentRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class StudentResearchController extends Controller
{
    use ResponseTrait;
    private $model;
    public function __construct(StudentResearch $obj)
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
                    ->from('student_research_students')
                    ->whereRaw('student_research_students.student_research_id = ' . $id . '');
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
            'content' => 'required|string|max:1000',
            // 'student_id' => 'required',
            'lecturer_id' => 'required',
            'year' => 'required',
            'archivist' => 'required',
            'storage_location' => 'required',
            'result' => 'required',
            'file' => 'max:10240|mimes:doc,docx,pdf,jpg,png',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }

        //validate mã sinh viên
        $arrStudentIds = StringHepler::changeFormatArrId($request->get('student_id'));
        if (empty($arrStudentIds) ||  count($arrStudentIds) != 2) {
            return $this->responseError('', 'Bắt buộc phải thêm 2 mã sinh viên!');
        }
        //validate mã giảng viên
        $lecturerId = (new LecturerRepository())->getIdByCode($request->get('lecturer_id'));
        if (empty($lecturerId)) {
            return $this->responseError('', 'Mã giảng viên không tồn tại!');
        }

        $newObj = new $this->model();
        $newObj->tittle = $request->get('tittle');
        $newObj->content = $request->get('content');
        $newObj->lecturer_id = $lecturerId; // layas id giarng vien ddeer themv ao
        $newObj->year = $request->get('year');
        $newObj->archivist = $request->get('archivist');
        $newObj->result = $request->get('result');
        $newObj->storage_location = $request->get('storage_location');
        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $nameFile = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads\storage'), $nameFile);
            $newObj->file = $nameFile;
        }
        $newObj->save();
        // dd();

        // dd();


        foreach ($arrStudentIds as $item) {
            (new StudentResearchStudentRepository())->createModel([
                'student_id' => (new StudentRepository())->getIdByCode($item),
                'student_research_id' => $newObj->id,
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
            'content' => 'required|string|max:1000',
            // 'student_id' => 'required',
            'lecturer_id' => 'required',
            'year' => 'required',
            'result' => 'required',
            'archivist' => 'required',
            'storage_location' => 'required',
            'file' => 'max:10240|mimes:doc,docx,pdf,jpg,png',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }

        //handle mã sinh viên
        $arrStudentIds = StringHepler::changeFormatArrId($request->get('student_id'));
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
            //handle lấy id giảng viên
            $obj->lecturer_id = $lecturerId;
            $obj->year = $request->get('year');
            $obj->archivist = $request->get('archivist');
            $obj->storage_location = $request->get('storage_location');
            $obj->result = $request->get('result');
            if ($request->hasFile('file')) {

                $file = $request->file('file');
                $nameFile = date('YmdHi') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads\storage'), $nameFile);
                // if(!empty($obj->file)) {

                //     $link = '\\' . $obj->file;
                //     unlink(public_path('uploads\storage' . $link . ''));
                // }
                if (!empty($obj->file)) {

                    if (File::exists(public_path('uploads/storage/'. $obj->file),)) {
                        File::delete(public_path('uploads/storage/'. $obj->file),);
                    }
                }
                // Storage::delete($obj->file); //xoa file
                //http://luanvan-app.test/storage/uploads/kTKMZUu0r2sRNwCAMN93iUUmfnnfpOqtfHAR2i8f.png
                $obj->file = $nameFile;
            }
            $arrStudentId = [];
            foreach ($arrStudentIds as $item) {
                $arrStudentId[] = (new StudentRepository())->getIdByCode($item);
            }
            (new StudentResearchStudentRepository())->updateByIdStudentResearch($obj->id, $arrStudentId);

            $obj->save();
            return $this->responseSuccess('', 'Thay đổi thông tin thành công!');
        }
        return $this->responseError('', 'Không tìm thấy dữ liệu!');
    }

    public function distroy(Request $request)
    {
        $student = $this->model->findOrFail($request->get('id'));
        if ($student) {
            if (!empty($student->file)) {

                if (File::exists(public_path('uploads/storage/'. $student->file),)) {
                    File::delete(public_path('uploads/storage/'. $student->file),);
                }
            }
            (new StudentResearchStudentRepository())->deleteByIdStudenResearch($request->get('id'));
            $student->delete();
        }
        return $this->responseSuccess('', 'Xoá thành công!');
    }
    public function filter(Request $request)
    {
        $year = $request->get('year');
        $name = $request->get('search');
        $data = [];
        $query = $this->model
            ->where(
                'tittle',
                'like',
                '%' . $name . '%',
            )
            ->orderBy('created_at', 'DESC');
        if (!empty($year)  || !empty($name)) {
            if ((int)$year != -1) {
                $query = $query->where('year', $year);
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
