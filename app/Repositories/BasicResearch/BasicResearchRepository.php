<?php

namespace App\Repositories\BasicResearch;

use App\Models\BasicResearch;
use App\Repositories\BaseRepository;

class BasicResearchRepository extends BaseRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new BasicResearch();
    }

    /**
     * hàm lấy thông tin giảng viên theo mã gv
     * @param string code
     */

    public function findById($id)
    {
        try {
            $data = $this->model::query()->findOrFail($id);
            return $data;   
        } catch (\Throwable $e) {
            return null;
        }
    }
}
