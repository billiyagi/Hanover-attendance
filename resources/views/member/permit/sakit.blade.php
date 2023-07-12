@extends('layouts.main.member')

@section('title', 'Izin Sakit')

@section('content')

    <form action="/member/permit/sakit/store" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="type" value="sakit">
        @csrf

        <div class="p-3">
            

            <div class="form-control w-full ">
                <label class="label">
                    <span class="label-text">Sakit</span>
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
                    <span class="label-text">Surat Keterangan Dokter</span>
                </label>
                <input type="file" class="file-input file-input-bordered w-full " name="permit_image"
                    {{ old('permit_image') }} />
                @error('permit_image')
                    <label class="label">
                        <span class="text-red-600 label-text-alt">{{ $message }}</span>
                    </label>
                @enderror
                <label class="label">
                    <span class="label-text-alt">Format: JPG | Maks: 2Mb</span>
                </label>
            </div>

            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Deskripsi</span>
                </label>
                <textarea name="description" class="textarea textarea-bordered h-36"></textarea>
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
