<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PermitSakitRequest;
use App\Http\Requests\PermitCutiRequest;
use App\Http\Requests\PermitOtherRequest;
use Illuminate\Database\Eloquent\Builder;



class PermitController extends Controller
{
    //
    public function index(Permit $permit , Request $request)
    {
        $permits = $permit->scopeFilter($request->search)->orderBy('created_at', 'desc')->paginate(9);
        return view('member.permit.index' , compact('permits'));
    }

    public function sakit()
    {
        return view('member.permit.sakit');
    }

    public function cuti()
    {
        return view('member.permit.cuti');
    }

    public function other()
    {
        return view('member.permit.other');
    }

    
    public function storeSakit(PermitSakitRequest $request, Permit $permit)
    {
        // Validasi Request
        $request->validated();

        // User ID
        $userId = Auth::user()->id;

        // Menyimpan image ke storage
        $permitImage = $request->file('permit_image');
        $permitImageName = uniqid() . $permitImage->getClientOriginalName();

       
        Storage::put("img/permit" . "." . "jpg", $permitImage);

        





        // Menyimpan data dari request ke database
        if($permit::create([
            'title'     =>  $request->title,
            'description'   =>  $request->description,
            'permit_image'  =>  $request->file('permit_image')->store('permit_image'),
            'type'  =>  $request->type,
            'user_id'   =>  $userId
        ])) {

            // Notifikasi dan redirect success
            notify()->success('Permintaan Sakit Berhasil Dikirim', 'Operation Success');
            return redirect()->back();
        } else {

            // Notifikasi dan redirect failed
            notify()->error('Permintaan Sakit Gagal Dikirim', 'Operation Failed');
            return redirect()->back();
        }

    }
    public function storeCuti(PermitCutiRequest $request, Permit $permit)
    {
        // Validasi Request
        $request->validated();

        // User ID
        $userId = Auth::user()->id;


        // Menyimpan data dari request ke database
        if($permit::create([
            'title'     =>  $request->title,
            'description'   =>  $request->description,
            'user_id'   =>  $userId
        ])) {

            // Notifikasi dan redirect success
            notify()->success('Permintaan Cuti Berhasil Dikirim', 'Operation Success');
            return redirect()->back();
        } else {

            // Notifikasi dan redirect failed
            notify()->error('Permintaan Cuti Gagal Dikirim', 'Operation Failed');
            return redirect()->back();
        }

    }

    public function storeOther(PermitOtherRequest $request, Permit $permit)
    {
        // Validasi Request
        $request->validated();

        // User ID
        $userId = Auth::user()->id;

        // Menyimpan data dari request ke database
        if($permit::create([
            'title'     =>  $request->title,
            'description'   =>  $request->description,
            'user_id'   =>  $userId
        ])) {

            // Notifikasi dan redirect success
            notify()->success('Permintaan Lainnya Berhasil Dikirim', 'Operation Success');
            return redirect()->back();
        } else {

            // Notifikasi dan redirect failed
            notify()->error('Permintaan Lainnya Gagal Dikirim', 'Operation Failed');
            return redirect()->back();
        }

    }
}
