@extends('layouts.main.admin')

@section('title', 'CreateUsers')

@section('content')
    <div class="card w-full p-6 bg-base-300 mt-2">
        <div class="text-xl font-semibold ">Tambah User</div>
        <div class="divider mt-2"></div>
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="h-full w-full pb-6 bg-base-300">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-control w-full undefined">
                        <label class="label">
                            <span class="label-text text-base-content undefined">Nama Lengkap</span>
                        </label>
                        <input type="text" name="name" placeholder="" class="input  input-bordered w-full " value="{{ $user->name }}" required>
                    </div>
                    <div class="form-control w-full undefined"><label class="label"><span
                        class="label-text text-base-content undefined">Avatar</span></label><input type="file"
                    placeholder="" class="input-bordered w-full " name="avatar">
                        <label class="label">
                            <span class="label-text-alt">Format: JPG,JPEG,PNG | Maks: 2Mb</span>
                            @error('avatar')
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="form-control w-full undefined"><label class="label"><span
                                class="label-text text-base-content undefined">Email</span></label><input name="email" type="email"
                            placeholder="" class="input  input-bordered w-full " value="{{ $user->email }}" required></div>
                    <div class="form-control w-full undefined"><label class="label"><span
                                class="label-text text-base-content undefined">Username</span></label><input name="username" type="text"
                            placeholder="" class="input  input-bordered w-full " value="{{ $user->username }}" required>
                            <label class="label">
                                @error('username')
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                @enderror
                            </label>
                    </div>
                    <div class="form-control w-full undefined"><label class="label"><span
                        class="label-text text-base-content undefined">Password</span></label><input name="password" type="password"
                    placeholder="" class="input  input-bordered w-full ">
                    <label class="label">
                        @error('password')
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        @enderror
                    </label>
                    </div>
                    <div class="form-control w-full undefined"><label class="label"><span
                                class="label-text text-base-content undefined">NIP</span></label><input value="{{ $user->nip }}" name="nip" type="number"
                            placeholder="" class="input  input-bordered w-full " required></div>
                    <div class="form-control w-full undefined"><label class="label"><span
                        class="label-text text-base-content undefined">Hak Akses</span></label>
                        <select name="role_id" class="input input-bordered w-full">
                            @foreach($roles as $role)
                                <option {{ $user->role_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-16"><button class="btn btn-primary float-right">Simpan</button></div>
            </div>
        </form>
    </div>


@endsection

@section('script')

@endsection
