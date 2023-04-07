<?php

namespace App\Repositories\Dispatche;

use App\Models\Dispatche;
use App\Models\DispatchType;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DispatcheRepository extends BaseRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Dispatche();
    }

    public function create($data)
    {
        $this->model::query()->create($data);
    }

    // [
    //     ['email' => 'picard@example.com', 'votes' => 0],
    //     ['email' => 'janeway@example.com', 'votes' => 0],
    // ]
    public function createMultiple($data)
    {
        return $this->model::query()->insert($data);
    }

    public function update($id, $data)
    {
        $obj = $this->findById($id);
        if ($obj) {
            $obj->update($data);
            return $obj;
        }
        return null;
    }

    public function delete($id)
    {
        $obj = $this->findById($id);
        if (!empty($obj->file)) {

            if (File::exists(public_path('uploads/storage/'. $obj->file),)) {
                File::delete(public_path('uploads/storage/'. $obj->file),);
            }
        }
        if ($obj) {
            $obj->delete();
            return 'Xoá thành công!';
        }
        return null;
    }

    public function findById($id)
    {
        try {
            $data = $this->model::query()->findOrFail($id);
            return $data;
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function getData($role = 1, $params = [], $flagPanigate = true, $limit = 10)
    {
        $year = (int)@$params['year'] ?? '-1';
        $month = (int)@$params['month'] ?? '-1';
        $tittle = @$params['tittle'] ?? '';
        $date = @$params['date'] ?? 'created_at'; // mặc định là lấy bản ghi mới nhất theo created_at
        $type_id = (int)@$params['type_id'] ?? '-1';
        //2009-04-27
        $dateStr = ''; //%-%-%
        if ($year != -1 && !empty($year)) {
            $dateStr .= $year . '-';
        } else {
            $dateStr .= '%-';
        }
        if ($month != -1 && !empty($month)) {
            if ($month < 10) {
                $month = '0' . $month;
            }
            $dateStr .= $month . '-';
        } else {
            $dateStr .= '%-';
        }
        $dateStr .= '%';
        if ($date == 'created_at') {
            $date = 'dispatches.' . $date;
        }
        $data = $this->model::query()->select(DB::raw("`dispatches`.*,`dispatch_types`.id as type_id,`dispatch_types`.type_code,`dispatch_types`.type_name"))
            ->join('dispatch_types', 'dispatch_types.id', '=', (new $this->model)->getTable() . '.type_id')
            ->orderBy($date, 'DESC') //mặc định lấy tất cả bài viết mới nhất theo ngày phát hành
            ->where([
                ['role', $role],
                ['tittle', 'like', '%' . $tittle . '%'],
                [$date, 'like', $dateStr],
            ]);
        if ($type_id !== -1 && !empty($type_id)) {
            $data = $data->where('type_id', '=', $type_id);
        }
        // dd($data->toSql());   
        if ($flagPanigate) {
            $data = $data->paginate($limit)->onEachSide(1);
        } else {
            $data = $data->get();
        }

        return $data;
    }

    public function getCodes()
    {
        return $this->model::query()
            ->pluck('code');
    }

    public function findByCode($code, $role)
    {
        $isExist = $this->model::query()
            ->where('code', $code)
            ->where('role', $role)
            ->first();
        return ($isExist);
    }

    public function getByWeek($type) {
        $data = $this->model::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('role',$type)->get();
        return $data;
    }
}
