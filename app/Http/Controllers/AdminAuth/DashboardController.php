<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //Add
    public function index()
    {
        return  view('admin/layout/dashboard');
    }

}
