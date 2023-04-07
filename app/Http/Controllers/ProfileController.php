<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\Lecturer\LecturerRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use ResponseTrait;
    private $repository;
    public function __construct(LecturerRepository $repository) {
        $this->repository = $repository;
    }

    public function update(Request $request)
    {
        $rules = [
            'new_name' => 'required|string|max:50',
            'new_phone' => 'required|string|min:10|max:10',
            'old_password' => [
                'min:6',
                'max:50',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Mật khẩu hiện tại không đúng');
                    }
                },
            ],
            'new_password' => 'min:6|max:50',
        ];
        // if ($request->has('new_password') && !empty($request->get('new_password'))) {
        // }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->responseError($validator->errors());
        }
            $user = $this->repository->findById(Auth::user()->id);
            $user->name = $request->get('new_name') ?? $user->name;
            $user->phone = $request->get('new_phone') ?? $user->phone;
            $user->password = Hash::make($request->get('new_password'));
            $user->save();
            return $this->responseSuccess($user,'Thay đổi thông tin thành công!');
    }
}
