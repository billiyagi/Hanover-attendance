<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function create(Request $request)
    {
        // // Validate the request data
        // $validatedData = $request->validate([
        //     'name' => 'required|string',
        //     'username' => 'required|unique:users',
        //     'nip' => 'required|size:10|unique:users',
        //     'email' => 'required|email|unique:users',
        //     'role' => 'required|in:admin,member',
        //     'password' => 'required|string',
        //     'avatar' => 'required|string',
        // ]);

        // // Create a new user
        // $user = User::create($validatedData);

        // // Optionally, you can redirect to a success page or show a success message
        // return redirect()->back()->withSuccess('User created successfully!');

        $roles = Roles::orderBy('name')->get();

        return view('admin.user.create', compact('roles'));
    }

    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $path = "default.png";

        if($request->avatar) {
            $avatar = $request->avatar;
            $avatar_name = uniqid().'.'.$avatar->getClientOriginalExtension();
    
            Storage::disk('public')->putFileAs('img/avatar', $avatar, $avatar_name);
    
            $path = Storage::disk('public')->url('img/avatar/'.$avatar_name);
        }

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'nip' => $request->nip,
            'email' => $request->email,
            'role' => $request->role_id == '1' ? 'admin' : 'member',
            'password' => bcrypt($request->password),
            'avatar' => $path,
            'role_id' => $request->role_id
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil disimpan!');
    }
}
