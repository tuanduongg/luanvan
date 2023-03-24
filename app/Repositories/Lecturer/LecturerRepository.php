<?php
namespace App\Repositories\Lecturer;
use App\Models\Lecturer;
use App\Repositories\BaseRepository;

class LecturerRepository extends BaseRepository {
    private $model;

    public function __construct()
    {
        $this->model = new Lecturer();
    }

    /**
     * hàm lấy thông tin giảng viên theo mã gv
     * @param string code
     * @return array object lecturer
     */
    public function getLecturerByCode($code) {
        $data = [];
        $data = $this->model::query()
            ->where('code',$code)
            ->get();
        return $data;
    }

    /**
     * hàm lấy id giảng viên theo mã gv
     * @param string code
     * @return string id lecturer
     */
    public function getIdByCode($code) {
        $data = '';
        try {
            $data = $this->model::query()
            ->where('code',$code)
            ->first()->id;
        } catch (\Throwable $th) {
            return $data;
        }
        return $data;
    }

    public function findById($id) {
        $data = '';
        try {
            $data = $this->model::query()
            ->findOrFail($id);
        } catch (\Throwable $e) {
            return $data;
        }
        return $data;
        
    }

    public function getCodeById($id) {
        return $this->model::query()
            ->where('id',$id)
            ->get('code')[0]->code ?? '';
    }

    /**
     * hàm thêm mới 1 giảng viên vào db
     * @param array data
     * @return void
     */
    public function createLecturer($data) {

        $this->model::query()->create($data);
    }

    
}