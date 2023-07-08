@extends('layouts.main.admin')

@section('title', 'Data User')

@section('content')

    <div class="card w-full p-6 mt-2 bg-base-300 my-8">
        <div class="text-xl font-semibold flex justify-between items-center">
            <div class="text-xl font-semibold inline-block">{{ $data->name }}</div>
            <div>
                <div class="join me-3">
                    <a href="{{ url('/admin/dataUser/' . $data->id . '/export/excel') }}"
                        class="btn px-6 btn-sm normal-case btn-success join-item text-white">
                        <i class="fa-solid fa-file-excel"></i>
                        Excel
                    </a>
                    <a href="{{ url('/admin/dataUser/' . $data->id . '/export/pdf') }}"
                        class="btn px-6 btn-sm normal-case btn-error join-item text-white">
                        <i class="fa-solid fa-file-pdf"></i>
                        Pdf
                    </a>
                </div>
            </div>
        </div>

        <div class="divider mt-2"></div>
        <div class="h-full w-full pb-6 bg-base-300">
            <div class="overflow-x-auto w-full">
                    <table class="table w-full">
                        <thead>
                            <tr class="bg-base-200">
                                <th>Name</th>
                                <th>Username</th>
                                <th>NIP</th>
                                <th>Email</th>
                                <th>Avatar</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="flex items-center space-x-3">
                                            <div>
                                                <div class="font-bold">{{ $user->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->nip }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="avatar">
                                            <div class="mask mask-circle w-12 h-12">
                                                <img src="{{ $user->avatar }}" alt="Avatar">
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="hidden" value="{{ $data->id }}" name="data_id"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            <div class="mt-16">
                <div class="float-right">
                    <a href="{{ url('/admin/data') }}" class="btn btn-neutral mr-3">Kembali</a>
                </div>
            </div>
                    
            </div>
        </div>
    </div>

@endsection
