<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


//use db
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Halaman Dashboard
    public function index()
    {
        return view('admin.dashboard.index');
    }

    // Halaman Data Member
    public function member()
    {

        $datas = User::all();
        return view('admin.dashboard.member', compact('user'));
    }

    //Create Data Member
    public function store(Request $request)
    {
        return view('admin.dashboard.createMember');
    }
}
