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

        $user = DB::table('users')
        ->join('roles', 'users.role_id', '=',
        'roles.id')
        ->select('users.*', 'roles.name as role')
        ->get();

        return view('admin.dashboard.member', compact('user'));
    }

    //Create Data Member
    public function store(Request $request)
    {
        return view('admin.dashboard.createMember');
    }
}

