@extends('layouts.main.admin')

@section('title', 'Buat Pengguna')

@section('content')
    <form action="/admin/users/store" enctype="multipart/form-data" method="post">
        @csrf
        <div class="flex flex-row">

            {{-- Foto Profil Pengguna --}}
            <div class="card bg-base-300 basis-auto me-10 p-6 h-full w-[500px]">
                <div class="text-xl font-semibold ">Foto</div>
                <div class="divider mt-2"></div>
                <div class="card-body p-0">
                    <img src="{{ asset('assets/img/default.png') }}" alt="Foto Image" id="thumbnail">
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
                            value="{{ old('name') }}" />
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
                        <input type="text" name="username" class="input input-bordered w-full"
                            value="{{ old('username') }}" />
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
                            value="{{ old('email') }}" />
                        @error('email')
                            <label class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-lg">Password</span>
                        </label>
                        <input type="password" name="password" class="input input-bordered w-full"
                            value="{{ old('password') }}" />
                        @error('password')
                            <label class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    {{-- Peran --}}
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text text-lg">Hak Akses</span>
                        </label>
                        <select class="select select-bordered w-full" name="role">
                            <option disabled selected>-- Pilih Peran Pengguna --</option>
                            <option value="1">Administrator</option>
                            <option value="2">Member</option>
                        </select>
                        @error('role')
                            <label class="label">
                                <span class="label-text-alt text-red-600">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-10">
                        <button class="btn btn-primary w-40">Buat Pengguna</button>
                    </div>
                </div>
            </div>
        </div>

    </form>


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
