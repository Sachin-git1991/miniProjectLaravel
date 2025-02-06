<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
    	$userDetails =  UserModel::where('roles',3)->get();

    	return view('user', compact('userDetails'));

    }
}
