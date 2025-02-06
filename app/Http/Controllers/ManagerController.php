<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManagerModel;

class ManagerController extends Controller
{
    public function index()
    {
    	$managerDetails =  ManagerModel::where('roles',2)->get();

        return view('manager', compact('managerDetails'));

    }
}
