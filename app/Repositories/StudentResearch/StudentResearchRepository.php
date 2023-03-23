<?php

namespace App\Repositories\StudentResearch;

use App\Models\StudentResearch;
use App\Repositories\BaseRepository;

class StudentResearchRepository extends BaseRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new StudentResearch();
    }

    /**
     * hàm lấy thông tin giảng viên theo mã gv
     * @param string code
     */

    public function findById($id)
    {
        try {
            $theses = $this->model::query()->with('lecturer')->findOrFail($id);
            return $theses;   
        } catch (\Throwable $e) {
            return null;
        }
    }
}
