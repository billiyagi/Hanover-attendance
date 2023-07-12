@extends('layouts.main.member')

@section('title', 'Other')

@section('content')


    <form action="/member/permit/other/store" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="type" value="cuti">
        @csrf
        <div class="p-5">
        
            <div class="form-control w-full ">
                <label class="label">
                    <span class="label-text">Other</span>
                </label>
                <input type="text" class="input input-bordered w-full " name="title" />
                @error('title')
                    <label class="label">
                        <span class="text-red-600 label-text-alt">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Deskripsi</span>
                </label>   
                <textarea name="description" class="textarea textarea-bordered h-52"></textarea>
                @error('description')
                    <label class="label">
                        <span class="text-red-600 label-text-alt">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="mt-6">
                <button class="btn btn-active btn-primary float-right ">Submit</button>
            </div>
        </div>
    </form>

@endsection
