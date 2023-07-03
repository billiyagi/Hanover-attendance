<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PresentController extends Controller
{
    public function index()
    {
        return view('member.present.index');
    }

    public function test(Request $request)
    {
        $convertFromDataUri = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->data_url));

        Storage::put('public/test.png', $convertFromDataUri);
        dd($request->all());
    }
}
