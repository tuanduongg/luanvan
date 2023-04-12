<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJob;
use App\Jobs\SendEmailJob;
use App\Models\Dispatche;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {

        return view('setting_page.index',[

        ]);
    }

    
}
