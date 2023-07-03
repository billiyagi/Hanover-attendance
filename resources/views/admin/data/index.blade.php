@extends('layouts.main.admin')

@section('title', 'Data')

@section('content')
    <div class="card w-full p-6 mt-2 bg-base-300 my-8">
        <div class="text-xl font-semibold flex justify-between items-center">
            <form action="" class="form-control w-1/2">
                <div class="input-group">
                    <input type="text" placeholder="Search…" class="input input-bordered input-sm" name="search" />
                    <button class="btn btn-square btn-primary btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
            <a onclick="create_data.showModal()" class="btn px-6 btn-sm normal-case btn-primary text-white"><i
                    class="fa-solid fa-circle-plus"></i a>Buat Data</a>
        </div>
        <div class="divider mt-2"></div>
        <div class="h-full w-full pb-6 bg-base-300">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>No</th>
                            <th>Nama Data</th>
                            <th>Data Dibuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $number = 1;
                        @endphp
                        @empty($datas->all())
                            <tr>
                                <td colspan="6" class="text-center py-5 text-lg">Tidak ada data</td>
                            </tr>
                        @endempty
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $number }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td class="flex">
                                    <a href="/admin/dataUser/{{ $data->id }}" class="btn btn-warning btn-sm">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="/admin/data/{{ $data->id }}/edit" class="btn btn-primary btn-sm mx-3">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form method="post" action="/admin/data/{{ $data->id }}/delete">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-error btn-sm">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $number++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $datas->links() }}
        </div>





    @endsection
