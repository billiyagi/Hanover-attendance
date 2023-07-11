@extends('layouts.main.member')

@section('title', 'Account')

@section('content')

    {{-- Camera --}}
    <div id="wrap h-full w-full pb-6">
        {{-- <div class="h-full w-full pb-6"> --}}
            <form action="{{ route('member.account.update') }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-1 py-2 px-3 md:grid-cols-2">
                    <div class="py-3">
                        <div class="avatar">
                        <div class="mask mask-circle" style="width: 200px; height: 250px;">
                            <img src="{{ auth()->user()->avatar == 'default.png' ? 'https://reqres.in/img/faces/6-image.jpg' : auth()->user()->avatar }}" alt="Avatar">
                        </div>
                        </div>
                        <div class="mt-2 form-control w-full undefined" >
                            <input type="file"
                        placeholder="" class="input-bordered w-full " name="avatar">
                            <label class="label">
                                <span class="label-text-alt">Format: JPG,JPEG,PNG | Maks: 2Mb</span>
                                @error('avatar')
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4" >
                        <div class="form-control w-full undefined">
                            <label class="label">
                                <span class="label-text text-base-content undefined">Nama Lengkap</span>
                            </label>
                            <input type="text" name="name" placeholder="" class="input  input-bordered w-full "
                                value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="form-control w-full undefined">
                            <label class="label">
                                <span class="label-text text-base-content undefined">NIP</span>
                            </label>
                            <input type="number" name="nip" placeholder="" class="input  input-bordered w-full "
                                value="{{ auth()->user()->nip }}" readonly>
                        </div>
                        <div class="form-control w-full undefined">
                            <label class="label">
                                <span class="label-text text-base-content undefined">Email</span>
                            </label>
                            <input type="email" name="email" placeholder="" class="input  input-bordered w-full "
                                value="{{ auth()->user()->email }}" required>
                        </div>
                        <div class="form-control w-full undefined">
                            <label class="label">
                                <span class="label-text text-base-content undefined">Password</span>
                            </label>
                            <input type="password" name="password" placeholder="" class="input  input-bordered w-full "
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-4"><button class="btn btn-sm btn-primary float-right">Simpan Perubahan</button></div>
                    </div>
                </div>
            </form>
        {{-- </div> --}}
    </div>

    {{-- Photo Captured --}}
    {{-- <div id="resultFrame" style="display: none">
        <img alt="imgId" id="imgId" class="w-full h-full">
    </div> --}}

    <!-- needed if you want to display the image when you take a photo -->
    {{-- <img alt="imgId" id="imgId" class="w-48"> --}}
    {{-- <form action="/member/dashboard/test" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="data_url" id="inputDataUrl">
    </form> --}}

    <!--buttons to trigger the actions -->
    {{-- <div class="text-center mt-10">
                <button id="takePhotoButtonId" class="btn btn-lg btn-primary text-white">Ambil Foto</button>
            </div> --}}

@endsection
