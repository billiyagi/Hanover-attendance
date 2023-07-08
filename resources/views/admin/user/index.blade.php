@extends('layouts.main.admin')

@section('title', 'CreateUsers')

@section('content')
<div class="wrap-card-import card w-full p-6 bg-base-300 mt-2" @if($errors->has('file')) style="display: block" @else style="display: none" @endif>
    <div class="text-xl font-semibold ">Import Data</div>
    <div class="divider mt-2"></div>
    <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="h-full w-full pb-6 bg-base-300">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full undefined"><label class="label"><span
                    class="label-text text-base-content undefined">File Excel</span></label><input type="file"
                placeholder="" class="input-bordered w-full " name="file" required>
                    <label class="label">
                        <span class="label-text-alt">Format: XLS,XLSX | Maks: 5Mb</span>
                        @error('file')
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </div>
            <div class="mt-16">
                <button class="btn btn-sm btn-primary float-right ms-2">Import</button>
                <button type="button" class="btn btn-sm btn-default float-right btn-close">Tutup</button>
            </div>
        </div>
    </form>
</div>

    <div class="card w-full p-6 mt-2 bg-base-300 my-8">
        <div class="text-xl font-semibold inline-block">
            <form action="" method="GET" class="inline-block">
                <div class="join">
                    <input value="{{ $q }}" name="q" class="input input-sm input-bordered join-item" placeholder="Search..."/>
                    <button class="btn btn-primary btn-sm join-item rounded float-left">
                        <i class="fas fa-search"></i>
                    </button>
                  </div>

            </form>
            <div class="inline-block float-right">
                <div class="inline-block float-right">
                <a href="#" class="btn px-6 btn-sm normal-case btn-default btn-primary btn-import">Import Data</a>
                    <div class="dropdown">

                    </div>
            
                    <div class="join me-3 ">
                     <a href="{{ route('users.export', 'excel') }}" class="btn px-6 btn-sm normal-case btn-success join-tem text-white float-right">
                       <i class="fa-solid fa-file-excel"></i>Excel
                    </a>

    
                <a href="{{ route('users.export', 'pdf') }}" class="btn px-6 btn-sm normal-case btn-error join-tem text-white" style="background-color: red;">
                     <i class="fa-solid fa-file-pdf"></i>pdf
                     </a>
                    </div>

                    <div class="join me-3">
                    <a href="{{ route('users.create') }}" class="btn px-6 btn-sm normal-case btn-primary ">Tambah Data</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="divider mt-2"></div>
        <div class="h-full w-full pb-6 bg-base-300">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr class="bg-base-200">
                            <th>Nama</th>
                            <th>Email</th>
                            <th>NIP</th>
                            <th>Hak Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar">
                                            <div class="mask mask-circle w-12 h-12"><img src="{{ $user->avatar == 'default.png' ? 'https://reqres.in/img/faces/6-image.jpg' : $user->avatar }}" alt="Avatar"></div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->nip }}</td>
                                <td>
                                    @if($user->role == 'admin')
                                        <div class="badge badge-accent">Admin</div>
                                    @else
                                        <div class="badge badge-info">Member</div>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm normal-case btn-warning"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm normal-case btn-primary"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-sm normal-case btn-secondary"><i class="fas fa-times-circle"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {!! $users->onEachSide(5)->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            // click import button
            $('.btn-import').on('click', function(e) {
                e.preventDefault();

                $('.wrap-card-import').css({
                    "display": "block"
                });
            });

            // click tutup import
            $('.wrap-card-import .btn-close').on('click', function(e) {
                e.preventDefault();

                $('.wrap-card-import').css({
                    "display": "none"
                });
            });
        });
    </script>
@endsection

