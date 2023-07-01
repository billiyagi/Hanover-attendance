@extends('layouts.main.admin')

@section('title', 'Buat Laporan')

@section('content')
    @php 

    @endphp
    <form method="post" action="/admin/report/store" class="card w-full p-6 bg-base-300 mt-2">
        @csrf
        <div class="h-full w-full pb-6 bg-base-300">

            {{-- Nama --}}
            <div class="form-control w-full undefined mb-3">
                <label class="label">
                    <span class="label-text text-base-content undefined">Laporan</span>
                </label>
                <input type="text" placeholder="Cth: Laporan Bulan Februari" class="input  input-bordered w-full "
                    name="name" value="{{ old('name') }}">
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
                        value="{{ empty(old('range_start')) ? date('Y-m-d') : old('range_start') }}" name="range_start">
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
                    <input type="date" placeholder="Bulan Akhir" class="input  input-bordered w-full "
                        name="range_end" value="{{ old('range_end') }}">
                    @error('range_end')
                        <label class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
            </div>



            {{-- Pilih data pengguna --}}
            <div class="w-full">
                <label class="label">
                    <span class="label-text text-base-content undefined">Pilih data absensi untuk laporan</span>
                </label>
                <select class="select select-bordered w-full" name="attendance_id">
                    <option disabled selected>-- Pilih Data --</option>
                    @foreach ($attendances as $attendance)
                        @empty(old('attendance_id'))
                            <option value="{{ $attendance->id }}">{{ $attendance->name }}</option>
                        @else
                            @if ($attendance->id == old('attendance_id'))
                                <option value="{{ $attendance->id }}" selected>{{ $attendance->name }}</option>
                            @endif
                        @endempty
                    @endforeach
                </select>
                @error('attendance_id')
                    <label class="label">
                        <span class="label-text-alt text-red-600">{{ $message }}</span>
                    </label>
                @enderror
            </div>
            <div class="mt-16">
                <div class="float-right">
                    <a href="{{ url('/admin/report') }}" class="btn btn-neutral mr-3">Kembali</a>
                    <button class="btn btn-primary">Buat Laporan</button>
                </div>
            </div>
        </div>
    </form>

@endsection