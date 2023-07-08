@extends('layouts.main.admin')

@section('title', 'Users')

@section('content')
    <div class="card w-full p-6 bg-base-300 mt-2">
        <div class="text-xl font-semibold ">Detail User</div>
        <div class="divider mt-2"></div>
        <div class="h-full w-full pb-6 bg-base-300">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-control w-full undefined">
                        <label class="label">
                            <span class="label-text text-base-content undefined">Nama Lengkap</span>
                        </label>
                        <input type="text" name="name" placeholder="" class="input  input-bordered w-full " value="{{ $user->name }}" readonly>
                    </div>
                    <div class="form-control w-full undefined"><label class="label"><span
                        class="label-text text-base-content undefined">Avatar</span></label>
                        <div class="avatar">
                            <div class="mask mask-circle w-20 h-20"><img src="{{ $user->avatar == 'default.png' ? 'https://reqres.in/img/faces/6-image.jpg' : $user->avatar }}" alt="Avatar"></div>
                        </div>
                    </div>
                    <div class="form-control w-full undefined"><label class="label"><span
                                class="label-text text-base-content undefined">Email</span></label><input name="email" type="email"
                            placeholder="" class="input  input-bordered w-full " value="{{ $user->email }}" readonly></div>
                    <div class="form-control w-full undefined"><label class="label"><span
                                class="label-text text-base-content undefined">Username</span></label><input name="username" type="text"
                            placeholder="" class="input  input-bordered w-full " value="{{ $user->username }}" readonly>
                            <label class="label">
                                @error('username')
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                @enderror
                            </label>
                    </div>
                    <div class="form-control w-full undefined"><label class="label"><span
                        class="label-text text-base-content undefined">NIP</span></label>
                        <input value="{{ $user->nip }}" name="nip" type="number" placeholder="" class="input  input-bordered w-full " readonly></div>
            <div class="form-control w-full undefined"><label class="label"><span
                class="label-text text-base-content undefined">Hak Akses</span></label>
                <input value="{{ ucfirst($user->role) }}" name="role_id" type="text" placeholder="" class="input  input-bordered w-full " readonly>
            </div>
                </div>
                <div class="mt-16"><a href="{{ route('users.index') }}" class="btn btn-default float-right">Kembali</a></div>
        </div>
    </div>


@endsection

@section('script')

@endsection
