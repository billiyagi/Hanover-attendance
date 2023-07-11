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
        DB::beginTransaction();

        $path = auth()->user()->avatar;

        if($request->avatar) {
            if($path != "default.png") {
                // delete old avatar
                $old_path = explode("/", $path)[6];
                $old_path = public_path('storage/img/avatar/'.$old_path);

                if(file_exists($old_path)) {
                    unlink($old_path);
                }
            }

            // update new avatar
            $avatar = $request->avatar;
            $avatar_name = uniqid().'.'.$avatar->getClientOriginalExtension();
    
            Storage::disk('public')->putFileAs('img/avatar', $avatar, $avatar_name);
    
            $path = Storage::disk('public')->url('img/avatar/'.$avatar_name);
        }

        try {
            $user = User::findOrFail(auth()->user()->id);

            if($request->password) {
                $user->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            $user->update([
                'name' => $request->name,
                'nip' => $request->nip,
                'email' => $request->email,
                'avatar' => $path
            ]);

            DB::commit();
        } catch (Exception $e) {


            abort(500);
        }

        notify()->success('Profil berhasil disimpan!');

        return redirect()->route('member.account.index');
    }
}
