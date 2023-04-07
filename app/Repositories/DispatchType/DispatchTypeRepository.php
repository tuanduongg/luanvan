<?php

namespace App\Repositories\DispatchType;

use App\Models\DispatchType;
use App\Repositories\BaseRepository;

class DispatchTypeRepository extends BaseRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new DispatchType();
    }

    public function getAll() {
        $data = $this->model::query()->get();
        return $data ?? '';
    }

    public function findById($id) {
        $data = $this->model::query()->find($id);
        return $data ?? '';
    }

    public function getIdByName($name) {
       $data = $this->model::query()->where('type_name','like','%'. $name .'%')->first();
       if($data) {
        return $data->id;
       }
       $arr = explode(' ',$name);
       $code = '';
        foreach ($arr as $value) {
            $code .= mb_strtoupper($value[0]);
       }
       $dispatch_type = new $this->model;
       
        $dispatch_type->type_code= $code;
        $dispatch_type->type_name = $name;
        $dispatch_type->save();
        return $dispatch_type->id;
       
    }

    public function createByName($name) {
        $arr = explode(' ',$name);
       $code = '';
        foreach ($arr as $value) {
            $code .= mb_strtoupper($value[0]);
       }
       $dispatch_type = new $this->model;
       
        $dispatch_type->type_code= $code;
        $dispatch_type->type_name = $name;
        $dispatch_type->save();
        return $dispatch_type->id;
    }

    
}