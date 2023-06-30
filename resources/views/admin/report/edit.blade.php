@extends('layouts.main.admin')

@section('title', 'Ubah Laporan')

@section('content')

    <form method="post" action="/admin/report/{{ $report->id }}/update" class="card w-full p-6 bg-base-300 mt-2">
        @csrf
        @method('PUT')
        <div class="h-full w-full pb-6 bg-base-300">

            {{-- Nama --}}
            <div class="form-control w-full undefined mb-3">
                <label class="label">
                    <span class="label-text text-base-content undefined">Absensi</span>
                </label>
                <input type="text" placeholder="Cth: Absensi Bulan Februari" class="input  input-bordered w-full "
                    name="name" value="{{ empty(old('name')) ? $report->name : old('name') }}">
                @error('name')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            {{-- Durasi Mulai dan Akhir --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full undefined mb-3">
                    <label class="label">
                        <span class="label-text text-base-content undefined">Mulai</span>
                    </label>
                    <input type="date" placeholder="Bulan dimulai Februari" class="input  input-bordered w-full "
                        value="{{ empty(old('range_start')) ? $report->range_start : old('range_start') }}"
                        name="range_start">
                    @error('range_start')
                        <label class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="form-control w-full undefined mb-3">
                    <label class="label">
                        <span class="label-text text-base-content undefined">Akhir</span>
                    </label>
                    <input type="date" placeholder="Bulan Februari" class="input  input-bordered w-full "
                        name="range_end"
                        value="{{ empty(old('range_end')) ? $report->range_end : old('range_end') }}">
                    @error('range_end')
                        <label class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
            </div>

            {{-- Data Pengguna --}}

            <div class="w-full">
                <label class="label">
                    <span class="label-text text-base-content undefined">Pilih data pengguna untuk laporan</span>
                </label>
                <select class="select select-bordered w-full" name="attendance_id">
                    @foreach ($attendances as $attendance)
                        @if (old('attendance_id'))
                            <option value="{{ $attendance->id }}">{{ $attendance->name }}</option>
                        @else
                            @if ($attendance->id == $report->attendance_id)
                                <option value="{{ $attendance->id }}" selected>{{ $attendance->name }}</option>
                            @else
                                <option value="{{ $attendance->id }}">{{ $attendance->name }}</option>
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
                <a href="{{ url('/admin/report') }}" class="btn btn-neutral mr-3">Kembali</a>
                <button class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</form>

@endsection