@extends('layouts.main.admin')

@section('title', 'Ubah Data')

@section('content')

<div class="card w-full p-6 bg-base-300 mt-2 mb-5">
        <div class="divider mt-2"></div>

    <form action="/admin/data/{{ $data->id }}/update" method="POST" enctype="multypart/form-data">
            @csrf     
            @method('PUT') 
            <div class="h-full w-full pb-6 bg-base-300">
                    <div class="form-control w-full undefined">
                        <label class="label">
                            <span class="label-text text-base-content undefined">Name</span>
                        </label>
                        <input type="text" class="input  input-bordered w-full " name="name"  value="{{ empty(old('name')) ? $data->name : old('name') }}">
                        @error('name')
                        <label class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </label>
                    @enderror
                    </div>
            <div class="mt-16">
                <div class="float-right">
                    <button class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </form>
</div>



<div class="card w-full p-6 mt-2 bg-base-300 my-8">
    <div class="text-xl font-semibold inline-block"><div class="inline-block float-right">
        </div>
        <div class="divider mt-2"></div>
        <div class="h-full w-full pb-6 bg-base-300">
            <div class="overflow-x-auto w-full">
                <form action="/admin/dataUser/{{ $data->id }}/update" method="POST" enctype="multypart/form-data">
                    @csrf    
                    @method('PUT') 
                        <table class="table w-full">
                            <thead>
                                <tr class="bg-base-200">
                                    <th>
                                        <input type="checkbox" name="" id="">
                                    </th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Nip</th>
                                    <th>Email</th>
                                    <th>avatar</th>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($users as $user )
                                        
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="selected_users[]" value="{{ $user->id }}" {{ in_array($user->id, $selectedUsers) ? 'checked' : '' }}>
                                            </td>
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
                                                        <img src="https://reqres.in/img/faces/1-image.jpg" alt="Avatar">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><input type="hidden" value="{{ $data->id}}" name="data_id"></td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{$users->links()}}
                    <div class="mt-16 float-right">
                        <a href="{{ url('/admin/data') }}" class="btn btn-neutral mr-3">Kembali</a>
                        <button class="btn btn-primary float-right">Simpan Perubahan</button></div>
                </form>
            </div>
        </div>
        
    </div>
</div>
    
@endsection

