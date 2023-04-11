<?php

namespace App\Repositories\Theses;

use App\Models\Theses;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class ThesesRepository extends BaseRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Theses();
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

    public function staticFiveSchoolYears($arr)
    {
        $data = $this->model::query()
            ->select(DB::raw("COUNT(*) as total_theses"), 'theses.school_year')
            ->whereIn('theses.school_year', $arr)
            ->groupBy('school_year')
            ->get();
        return $data;
    }
}
