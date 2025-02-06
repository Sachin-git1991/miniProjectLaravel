<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class AdminController extends Controller
{
    public function index()
    {
    	$managerDetails =  AdminModel::where('roles',2)->get();
        $userDetails =  AdminModel::where('roles',3)->get();

    	return view('admin', compact('managerDetails','userDetails'));

    }
}
