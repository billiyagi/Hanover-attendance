@extends('layouts.main.admin')

@section('title', 'Settings')

@section('content')
    <div class="card w-full p-6 bg-base-300 mt-2">
        <div class="text-xl font-semibold ">Profile Settings</div>
        <div class="divider mt-2"></div>
        <div class="h-full w-full pb-6 bg-base-300">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full undefined">
                    <label class="label">
                        <span class="label-text text-base-content undefined">Name</span>
                    </label>
                    <input type="text" placeholder="" class="input  input-bordered w-full " value="Alex">
                    <label class="label">
                        <span class="label-text-alt text-red-600">Bottom Left label</span>
                        <span class="label-text-alt">Bottom Right label</span>
                    </label>
                </div>
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">Email Id</span></label><input type="text"
                        placeholder="" class="input  input-bordered w-full " value="alex@dashwind.com"></div>
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">Title</span></label><input type="text"
                        placeholder="" class="input  input-bordered w-full " value="UI/UX Designer"></div>
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">Place</span></label><input type="text"
                        placeholder="" class="input  input-bordered w-full " value="California"></div>
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">About</span></label>
                    <textarea class="textarea textarea-bordered w-full" placeholder="">Doing what I love, part time traveller</textarea>
                </div>
            </div>
            <div class="divider"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">Language</span></label><input type="text"
                        placeholder="" class="input  input-bordered w-full " value="English"></div>
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">Timezone</span></label><input type="text"
                        placeholder="" class="input  input-bordered w-full " value="IST"></div>
                <div class="form-control w-full undefined"><label class="label cursor-pointer"><span
                            class="label-text text-base-content undefined">Sync Data</span><input type="checkbox"
                            class="toggle" checked=""></label></div>
            </div>
            <div class="mt-16"><button class="btn btn-primary float-right">Update</button></div>
        </div>
    </div>
@endsection
