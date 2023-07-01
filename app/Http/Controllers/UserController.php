<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        // $users = DB::table('users')->get();
        $users = DB::select('select * from users');

        $dataTable->render('admin.user.index');
        
        return view('admin.user.index', ['user' => $users]);
    }
}


