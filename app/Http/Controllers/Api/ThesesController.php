<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Theses;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\StringHepler;
use App\Helpers\DateHelper;
use Carbon\Carbon;
use App\Repositories\Lecturer\LecturerRepository;
use App\Repositories\Student\StudentRepository;
use App\Repositories\ThesesStudent\ThesesStudentRepository;

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
            ->whereIn('id', function ($query) use ($thesesId) {
                $query->select(DB::raw('student_id'))
                    ->from('theses_students')
                    ->whereRaw('theses_students.theses_id = ' . $thesesId . '');
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
            'tittle' => 'required|string|max:200',
            'content' => 'required|string|max:500',
            'year' => 'required',
            'archivist' => 'required',
            'storage_location' => 'required',
            'file' => 'max:10000|mimes:doc,docx,pdf,jpg,png',
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

        //validate ngày bắt đầu, ngày kết thúc
        if (DateHelper::compareTwoDate($request->get('start_date'), $request->get('end_date'))) {
            return $this->responseError('', 'Ngày bắt đầu phải lớn hơn ngày kết thúc!');
        };
        $newTheses = new $this->model();
        $newTheses->code = 'LV' . Carbon::now()->timestamp; //generate code luanaj van
        $newTheses->tittle = $request->get('tittle');
        $newTheses->content = $request->get('content');
        $newTheses->lecturer_id = $lecturerId; // layas id giarng vien ddeer themv ao
        $newTheses->start_date = $request->get('start_date');
        $newTheses->end_date = $request->get('end_date');
        $newTheses->school_year = $request->get('school_year');
        $newTheses->archivist = $request->get('archivist');
        $newTheses->storage_location = $request->get('storage_location');
        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $nameFile = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads\storage'), $nameFile);
            // $path = $request->file('file')->store('public/uploads');
            // $nameFile = basename($path);
            // http://luanvan-app.test/uploads/theses/202303211607.jpg
            //http://luanvan-app.test/storage/uploads/kTKMZUu0r2sRNwCAMN93iUUmfnnfpOqtfHAR2i8f.png
            $newTheses->file = $nameFile;
        }
        $newTheses->save();
        // dd();

        // dd();


        foreach ($arrStudentIds as $item) {
            (new ThesesStudentRepository())->createModel([
                'student_id' => (new StudentRepository())->getIdByCode($item),
                'theses_id' => $newTheses->id,
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
            'end_date' => 'required|date',
            // 'student_id' => 'required',
            'lecturer_id' => 'required',
            'school_year' => 'required',
            'archivist' => 'required',
            'storage_location' => 'required',
            'file' => 'max:10000|mimes:doc,docx,pdf,jpg,png',
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
            $obj->start_date = $request->get('start_date');
            $obj->end_date = $request->get('end_date');
            //handle lấy id giảng viên
            $obj->lecturer_id = $lecturerId;
            $obj->school_year = $request->get('school_year');
            $obj->archivist = $request->get('archivist');
            $obj->storage_location = $request->get('storage_location');
            if ($request->hasFile('file')) {

                $file = $request->file('file');
                $nameFile = date('YmdHi') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads\storage'), $nameFile);
                $link = '\\' . $obj->file;
                unlink(public_path('uploads\storage' . $link . ''));
                // Storage::delete($obj->file); //xoa file
                //http://luanvan-app.test/storage/uploads/kTKMZUu0r2sRNwCAMN93iUUmfnnfpOqtfHAR2i8f.png
                $obj->file = $nameFile;
            }
            $arrStudentId = [];
            foreach ($arrStudentIds as $item) {
                $arrStudentId[] = (new StudentRepository())->getIdByCode($item);
            }
            (new ThesesStudentRepository())->updateByIdTheses($obj->id, $arrStudentId);

            $obj->save();
            return $this->responseSuccess('', 'Thay đổi thông tin thành công!');
        }
        return $this->responseError('', 'Không tìm thấy dữ liệu!');
    }

    public function distroy(Request $request)
    {
        $student = $this->model->findOrFail($request->get('id'));
        if ($student) {
            (new ThesesStudentRepository())->deleteByIdTheses($request->get('id'));
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

        // $search = $request->get('search');
        // $data = [];
        // if (!empty($search)) {
        //     $query = $this->model
        //         ->where(
        //             'tittle',
        //             'like',
        //             '%' . $search . '%',
        //         );
        //     $data = $query
                
        //         ->paginate(10)
        //         ->onEachSide(1);
        // } else {
        //     $data = $this->model->paginate(10)->onEachSide(1);
        // }
        // return $this->responseSuccess($data);
    }
}
