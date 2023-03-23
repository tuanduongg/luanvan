<?php

namespace App\Repositories\CreativeIdea;

use App\Models\CreativeIdea;
use App\Repositories\BaseRepository;

class CreativeIdeaRepository extends BaseRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new CreativeIdea();
    }

    /**
     * hàm lấy thông tin giảng viên theo mã gv
     * @param string code
     */

    public function findById($id)
    {
        try {
            $data = $this->model::query()->with('lecturer')->findOrFail($id);
            return $data;   
        } catch (\Throwable $e) {
            return null;
        }
    }
}
