@extends('layouts.main.admin')

@section('title', 'Ubah Data User')

@section('content')

    <div class="card w-full p-6 mt-2 bg-base-300 my-8">
        <div class="text-xl font-semibold inline-block">{{ $data->name }}<div class="inline-block float-right">
        </div>
        <div class="divider mt-2"></div>
        <div class="h-full w-full pb-6 bg-base-300">
            <div class="overflow-x-auto w-full">
                <form action="{{url('admin/dataUser/'.$data->id.'/update')}}" method="POST" enctype="multypart/form-data">
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
                            <td>id</td>
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
                <div class="mt-16"><button class="btn btn-primary float-right">Tambah</button></div>
            </div>
        </div>
    </div>
</form>
@endsection
