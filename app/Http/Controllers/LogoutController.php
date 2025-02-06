<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class LogoutController extends Controller
{
    public function logout()
    {
    	Session::flush(); 
        Log::info('Logout Fucntion');
        return redirect()->route('login');
    }
}
