<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Psy\debug;

class DashboardController extends Controller
{
    public function index()
    {
        // dd('hell yhaa!');
        return view('admin.dashboard');
    }
}
