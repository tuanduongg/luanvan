<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\StringHepler;
use App\Models\BasicResearch;
use App\Models\BasicResearchLecturer;
use App\Models\Lecturer;
use App\Models\Student;
use App\Repositories\BasicResearchLecturer\BasicResearchLecturerRepository;
use App\Repositories\Lecturer\LecturerRepository;

class BasicResearchController extends Controller
{
    use ResponseTrait;
    private $model;
    public function __construct(BasicResearch $obj)
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
        $leaderId = (new BasicResearchLecturerRepository())->getLeaderIdByBasicResearch($id);
        $leaderCode  = (new LecturerRepository())->getCodeById($leaderId);
        $data = $this->model
            ->findOrFail($id); //tìm kiếm lecturer theo id


        $lecturers = Lecturer::query()
            ->whereIn('id', function ($query) use ($id) {
                $query->select(DB::raw('lecturer_id'))
                    ->from('basic_research_lecturers')
                    ->whereRaw('basic_research_lecturers.basic_research_id = ' . $id . '')
                    ->whereRaw('basic_research_lecturers.isLeader = 0');
            })
            ->get(['code', 'name']); // lấy mã sv,tên sv theo từng luận văn
        $leaderCode  = (new LecturerRepository())->getCodeById((new BasicResearchLecturerRepository())->getLeaderIdByBasicResearch($id));
        // DB::raw("SELECT students.student_code FROM `students`
        // WHERE students.id in (SELECT student_id FROM `theses_students` WHERE theses_students.theses_id = " . $request->get('id') . ")");
        // $result = array_merge($data->toArray(),$students->toArray());
        $result = $data;
        $result['lecturers'] = $lecturers;
        $result['leader_id'] = $leaderCode;
        return $this->responseSuccess($result);
    }


    public function store(Request $request)
    {
        // dd($request->get('lecturer_id'));

        $rules = [
            // 'code' => 'required',
            'tittle' => 'required|string|max:200',
            'content' => 'required|string|max:500',
            // 'student_id' => 'required',
            'leader_id' => 'required|exists:App\Models\Lecturer,code',
            'year' => 'required',
            'archivist' => 'required',
            'storage_location' => 'required',
            'result' => 'required|string|max:100',
            'file' => 'max:10000|mimes:doc,docx,pdf,jpg,png',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }

        //validate mã giảng viên
        $arrLecturerIds = StringHepler::changeFormatArrId($request->get('lecturer_id'));
        if (empty($arrLecturerIds)) {
            return $this->responseError('', 'Mã thành viên không được để trống!');
        } else {
            if (count($arrLecturerIds) > 5) {
                return $this->responseError('', 'Chỉ thêm tối đa 5 thành viên!');
            }
        }

        //validate mã leader có trong mã giảng viên ?

        if(preg_match('/'. $request->get('leader_id') .'/',$request->get('lecturer_id'))) {
            return $this->responseError('', 'Mã thành viên phải khác mã trưởng nhóm!');
        }

        
        //validate mã giảng viên

        $newObj = new $this->model();
        $newObj->tittle = $request->get('tittle');
        $newObj->content = $request->get('content');
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

        //add to table basiclecturerslecturer
        foreach ($arrLecturerIds as $item) {
            $lecturer_id = (new LecturerRepository)->getIdByCode($item);
            if(empty($lecturer_id)) {
                return $this->responseError('', 'Mã thành viên '. $item .' không tồn tại!');
            }
            (new BasicResearchLecturerRepository())->createModel([
                'lecturer_id' =>  $lecturer_id,
                'basic_research_id' => $newObj->id,
            ]);
        }
        (new BasicResearchLecturerRepository())->createModel([
            'lecturer_id' => (new LecturerRepository)->getIdByCode($request->get('leader_id')),
            'basic_research_id' => $newObj->id,
            'isLeader' => true,
        ]);

        return $this->responseSuccess(null, 'Thêm mới thành công!');
    }


    public function update(Request $request)
    {
        $rules = [
            'id' => 'required',
            'tittle' => 'required|string|max:200',
            'content' => 'required|string|max:500',
            'lecturer_id' => 'required',
            'leader_id' => 'required|exists:App\Models\Lecturer,code',
            'year' => 'required',
            'archivist' => 'required',
            'storage_location' => 'required',
            'result' => 'required|string|max:100',
            'file' => 'max:10000|mimes:doc,docx,pdf,jpg,png',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }

        //validate mã giảng viên
        $arrLecturerIds = StringHepler::changeFormatArrId($request->get('lecturer_id'));
        if (empty($arrLecturerIds)) {
            return $this->responseError('', 'Mã thành viên không được để trống!');
        } else {
            if (count($arrLecturerIds) > 5) {
                return $this->responseError('', 'Chỉ thêm tối đa 5 thành viên!');
            }
        }

        //validate mã leader có trong mã giảng viên ?

        if(preg_match('/'. $request->get('leader_id') .'/',$request->get('lecturer_id'))) {
            return $this->responseError('', 'Mã thành viên phải khác mã trưởng nhóm!');
        }

        $obj = $this->model->find($request->get('id'));
        if ($obj) {
            $obj->tittle = $request->get('tittle');
            $obj->content = $request->get('content');
            $obj->year = $request->get('year');
            $obj->archivist = $request->get('archivist');
            $obj->result = $request->get('result');
            $obj->storage_location = $request->get('storage_location');
            if ($request->hasFile('file')) {

                $file = $request->file('file');
                $nameFile = date('YmdHi') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads\storage'), $nameFile);
                if (!empty($obj->file)) {

                    $link = '\\' . $obj->file;
                    unlink(public_path('uploads\storage' . $link . ''));
                }
                $obj->file = $nameFile;
            }

            (new BasicResearchLecturerRepository())->deleteByIdBasicResearch($obj->id);

            foreach ($arrLecturerIds as $item) {
                $lecturer_id = (new LecturerRepository)->getIdByCode($item);
                if(empty($lecturer_id)) {
                    return $this->responseError('', 'Mã thành viên '. $item .' không tồn tại!');
                }
                (new BasicResearchLecturerRepository())->createModel([
                    'lecturer_id' =>  $lecturer_id,
                    'basic_research_id' => $obj->id,
                ]);
            }
            (new BasicResearchLecturerRepository())->createModel([
                'lecturer_id' => (new LecturerRepository)->getIdByCode($request->get('leader_id')),
                'basic_research_id' => $obj->id,
                'isLeader' => true,
            ]);

            $obj->save();
            return $this->responseSuccess('', 'Thay đổi thông tin thành công!');
        }
        return $this->responseError('', 'Không tìm thấy dữ liệu!');
    }

    public function distroy(Request $request)
    {
            $basicResearch = $this->model->find($request->get('id'));
            if ($basicResearch) {
                (new BasicResearchLecturerRepository())->deleteByIdBasicResearch($request->get('id'));
                $basicResearch->delete();
                return $this->responseSuccess('', 'Xoá thành công!');
            }
            return $this->responseError('', 'Không tìm thấy dữ liệu!');
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
