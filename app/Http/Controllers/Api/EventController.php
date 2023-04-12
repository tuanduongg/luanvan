<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Validator;


class EventController extends Controller
{
    use ResponseTrait;
    private $model;

    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    public function getAll() {
        $data = $this->model::query()->get();
        return $this->responseSuccess($data);
    }

    public function find(Request $request)
    {
        $data = $this->model->findOrFail($request->input('id'));
        return $this->responseSuccess($data);
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required|max:500',
            'start' => 'required|date',
            'end' => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }
        $event = $this->model->create($request->except('id'));
        return $this->responseSuccess($event, 'Thêm mới thành công!');
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|max:100',
            'start' => 'required|date',
            'end' => 'required|date',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }
        // dd($request->all());
        $event = $this->model::find($request->get('id'));
        $event->name = $request->get('name');
        $event->start = $request->get('start');
        $event->end = $request->get('end');
        $event->save();
        return $this->responseSuccess('', 'Thay đổi thông tin thành công!');
    }

    public function distroy(Request $request) {
        $id = $request->get('id');
        $event = $this->model::find($id);
        if(!empty($event)) {
            $event->delete();
        }
        return $this->responseSuccess('','Xoá sự kiện thành công!');
    }

    public function findById($id) {
        return $this->model::query()->where('id',$id)->first() ?? null;
    }
}
