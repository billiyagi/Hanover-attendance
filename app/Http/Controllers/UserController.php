<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|in:admin,member',
        ]);

        $user = User::create($request->all());

        return view('users.create');
   }
}

