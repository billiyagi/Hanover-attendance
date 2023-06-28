<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\DataUser;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index(DataUser $data)
    {
        return view('admin.report.index');
    }
}
