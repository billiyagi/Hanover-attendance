@extends('layouts.main.admin')

@section('title', 'Edit Pengguna')

@section('content')

    <form action="/admin/users/{{ $user->nip }}/update" enctype="multipart/form-data" method="post">
        @csrf
        @method('PUT')
        <div class="flex flex-row">

            {{-- Foto Profil Pengguna --}}
            <div class="card bg-base-300 basis-auto me-10 p-6 h-full w-[500px]">
                <div class="text-xl font-semibold ">Foto</div>
                <div class="divider mt-2"></div>
                <div class="card-body p-0">
                    <img src="{{ asset('storage/img/avatar/' . $user->avatar) }}" alt="Foto Image" id="thumbnail">
                    <input type="file" name="foto" class="file-input file-input-bordered w-full mt-5 file-thumbnail"
                        onchange="previewImg()" />
                </div>
                @error('foto')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            {{-- Detail Pengguna --}}
            <div class="card bg-base-300 basis-11/12 p-6">
                <div class="text-xl font-semibold ">
                    <a href="{{ url('/admin/users') }}" class="btn btn-accent mr-5 btn-sm">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    Detail Pengguna
                </div>
                <div class="divider mt-2"></div>
                <div class="card-body p-0">

                    {{-- Nama Lengkap --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-lg">Nama Lengkap</span>
                        </label>
                        <input type="text" name="name" class="input input-bordered w-full"
                            value="{{ old('name') || $user->name ? $user->name : old('name') }}" />
                        @error('name')
                            <label class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    {{-- Username --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-lg">Username</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" value="{{ $user->username }}" readonly />
                        @error('username')
                            <label class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-lg">Email</span>
                        </label>
                        <input type="email" name="email" class="input input-bordered w-full"
                            value="{{ old('email') || $user->email ? $user->email : old('email') }}" />
                        @error('email')
                            <label class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="form-control w-full undefined">
                        <label class="label">
                            <span class="label-text text-base-content undefined">Hak Akses</span>
                        </label>
                        <select name="role" class="input input-bordered w-full">
                            @if ($user->role == 1)
                                <option value="1" selected>Administrator</option>
                                <option value="2">Member</option>
                            @else
                                <option value="1">Administrator</option>
                                <option value="2" selected>Member</option>
                            @endif
                        </select>
                    </div>

                    <div class="mt-16 flex justify-end">
                        <div>
                            <a href="{{ url("/admin/users/$user->nip/password") }}" class="btn btn-info mr-5">Ganti
                                Password</a>
                            <button class="btn btn-primary">Simpan perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    {{-- <div class="card w-full p-6 bg-base-300 mt-2">
        <div class="flex items-center">
            <a href="{{ url('/admin/users') }}" class="btn btn-accent mr-5 btn-sm"><i class="fas fa-arrow-left"></i></a>
            <div class="text-xl font-semibold">{{ $user->name }}</div>
        </div>
        <div class="divider mt-2"></div>
        <form action="/admin/users/{{ $user->nip }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="h-full w-full pb-6 bg-base-300">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text text-base-content">Nama Lengkap</span>
                        </label>
                        <input type="text" name="name" class="input  input-bordered w-full "
                            value="{{ $user->name }}">
                        @error('name')
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text text-base-content">Avatar</span>
                        </label>
                        <input type="file" class="input-bordered w-full " name="foto" value="{{ $user->avatar }}">
                        <label class="label">
                            <span class="label-text-alt">Format: JPG,JPEG,PNG | Maks: 2Mb</span>
                            @error('foto')
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <div class="form-control w-full undefined">
                        <label class="label">
                            <span class="label-text text-base-content undefined">Email</span>
                        </label>
                        <input name="email" type="email" class="input  input-bordered w-full "
                            value="{{ $user->email }}" required>
                        <label class="label">
                            @error('email')
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <div class="form-control w-full undefined">
                        <label class="label">
                            <span class="label-text text-base-content undefined">Username</span>
                        </label>
                        <input name="username" type="text" class="input  input-bordered w-full "
                            value="{{ $user->username }}" readonly>
                        <label class="label">
                            @error('username')
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="form-control w-full undefined">
                        <label class="label">
                            <span class="label-text text-base-content undefined">NIP</span>
                        </label>
                        <input value="{{ $user->nip }}" name="nip" type="number" placeholder=""
                            class="input  input-bordered w-full " readonly>
                    </div>

                    <div class="form-control w-full undefined">
                        <label class="label">
                            <span class="label-text text-base-content undefined">Hak Akses</span>
                        </label>
                        <select name="role" class="input input-bordered w-full">
                            @foreach ($roles as $role)
                                <option {{ $user->role_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-16 flex justify-end">
                    <div>
                        <a href="{{ url("/admin/users/$user->nip/password") }}" class="btn btn-info mr-5">Ganti
                            Password</a>
                        <button class="btn btn-primary">Simpan perubahan</button>
                    </div>
                </div>
            </div>
        </form>
    </div> --}}


@endsection

@section('script')
    <script>
        function previewImg() {
            const thumbnail = document.querySelector('#thumbnail');
            const inputFile = document.querySelector('.file-thumbnail');

            const fileThumbnail = new FileReader();
            fileThumbnail.readAsDataURL(inputFile.files[0]);
            fileThumbnail.onload = function(e) {
                thumbnail.src = e.target.result;
            }
        }
    </script>
@endsection
