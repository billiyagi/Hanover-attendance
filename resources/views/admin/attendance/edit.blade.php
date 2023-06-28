@extends('layouts.main.admin')

@section('title', 'Ubah Absensi')

@section('content')
    <form method="post" action="/admin/attendance/{{ $attendance->id }}/update" class="card w-full p-6 bg-base-300 mt-2">
        @csrf
        @method('PUT')
        <div class="h-full w-full pb-6 bg-base-300">

            {{-- Nama --}}
            <div class="form-control w-full undefined mb-3">
                <label class="label">
                    <span class="label-text text-base-content undefined">Absensi</span>
                </label>
                <input type="text" placeholder="Cth: Absensi Bulan Februari" class="input  input-bordered w-full "
                    name="name" value="{{ empty(old('name')) ? $attendance->name : old('name') }}">
                @error('name')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            {{-- Durasi Absen Mulai dan Akhir --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full undefined mb-3">
                    <label class="label">
                        <span class="label-text text-base-content undefined">Absen Mulai</span>
                    </label>
                    <input type="date" placeholder="Absensi Bulan Februari" class="input  input-bordered w-full "
                        value="{{ empty(old('attend_start')) ? $attendance->attend_start : old('attend_start') }}"
                        name="attend_start">
                    @error('attend_start')
                        <label class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="form-control w-full undefined mb-3">
                    <label class="label">
                        <span class="label-text text-base-content undefined">Absen Akhir</span>
                    </label>
                    <input type="date" placeholder="Absensi Bulan Februari" class="input  input-bordered w-full "
                        name="attend_end"
                        value="{{ empty(old('attend_end')) ? $attendance->attend_end : old('attend_end') }}">
                    @error('attend_end')
                        <label class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
            </div>

            {{-- Waktu Absen Mulai dan Akhir --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-3">
                <div>
                    <label class="label">
                        <span class="label-text text-base-content undefined">Waktu Mulai</span>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-control w-full undefined">
                            <input type="time" class="input  input-bordered w-full "
                                value="{{ empty(old('time_start_deadline')) ? $attendance->time_start_deadline : old('time_start_deadline') }}"
                                name="time_start_deadline">
                            @error('time_start_deadline')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>
                        <div class="form-control w-full undefined">
                            <input type="time" class="input  input-bordered w-full "
                                value="{{ empty(old('time_start_gap_deadline')) ? $attendance->time_start_gap_deadline : old('time_start_gap_deadline') }}"
                                name="time_start_gap_deadline">
                            @error('time_start_gap_deadline')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>
                    </div>
                </div>


                <div>
                    <label class="label">
                        <span class="label-text text-base-content undefined">Waktu Akhir</span>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-control w-full undefined">
                            <input type="time" class="input  input-bordered w-full "
                                value="{{ empty(old('time_end_deadline')) ? $attendance->time_end_deadline : old('time_end_deadline') }}"
                                name="time_end_deadline">
                            @error('time_end_deadline')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>
                        <div class="form-control w-full undefined">
                            <input type="time" class="input  input-bordered w-full "
                                value="{{ empty(old('time_end_gap_deadline')) ? $attendance->time_end_deadline : old('time_end_deadline') }}"
                                name="time_end_gap_deadline">
                            @error('time_end_gap_deadline')
                                <label class="label">
                                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                                </label>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label class="label">
                    <span class="label-text text-base-content undefined">Pilih data pengguna untuk absensi</span>
                </label>
                <select class="select select-bordered w-full" name="data_id">
                    @foreach ($datas as $data)
                        @if (old('data_id'))
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @else
                            @if ($data->id == $attendance->data_id)
                                <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                            @else
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endif
                        @endempty
                    @endforeach
            </select>
            @error('data_id')
                <label class="label">
                    <span class="label-text-alt text-red-600">{{ $message }}</span>
                </label>
            @enderror
        </div>
        <div class="mt-16">
            <div class="float-right">
                <a href="{{ url('/admin/attendance') }}" class="btn btn-neutral mr-3">Kembali</a>
                <button class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</form>
@endsection
