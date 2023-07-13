<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index()
    {
        return view('member.Account.index');
    }

    public function update(Request $request)
    {
        $path = auth()->user()->avatar;
    
        if ($request->hasFile('avatar')) {
            if ($path != "default.png") {
                // delete old avatar
                $old_path = explode("/", $path)[6];
                $old_path = public_path('storage/img/avatar/' . $old_path);
    
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }
    
            $avatar = $request->file('avatar');
            $avatar_name = uniqid() . '.' . $avatar->getClientOriginalExtension();
    
            $avatar->storeAs('public/img/avatar', $avatar_name);
    
            $path = Storage::url('img/avatar/' . $avatar_name);
        }
    
        try {
            DB::transaction(function () use ($request, $path) {
                $user = User::findOrFail(auth()->user()->id);
    
                if ($request->password) {
                    $user->password = bcrypt($request->password);
                }
    
                $user->name = $request->name;
                $user->nip = $request->nip;
                $user->email = $request->email;
                $user->avatar = $path;
    
                $user->save();
            });
    
            notify()->success('Profil berhasil disimpan!');
        } catch (Exception $e) {
    
            notify()->error('Terjadi kesalahan saat menyimpan profil.');
        }
    
        return redirect()->route('member.account.index');
    }
}