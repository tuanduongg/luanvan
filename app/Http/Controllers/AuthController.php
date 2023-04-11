<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJob;
use App\Mail\LecturerEmail;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check() ) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $lecturer = Lecturer::where('email', $request->email)->first(); //tìm kiếm email trong db

        if (!$lecturer) { //nếU không có email => lỗi
            return back()->withErrors([
                'email' => 'Không tồn tại email!',
                'oldEmail' => $request->email,
            ]);
        }
        if (Hash::check($request->password, $lecturer->password)) { //check password nếu thành công -> login
                Auth::login($lecturer,$request->get('remember'));
                return redirect()->route('home'); //route
        } else {
            return back()->withErrors([
                'password' => 'Mật khẩu không chính xác!',
                'oldEmail' => $request->email,
            ]);
        }

        return back()->withErrors([
            'error' => 'Không tồn tại tài khoản trong hệ thống!',
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('auth.login');
    }

    
}
