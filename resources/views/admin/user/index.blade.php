@extends('layouts.main.admin')

@section('title', 'Users')

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
        <div class="text-xl font-semibold inline-block">Data Users<div class="inline-block float-right">
                <div class="inline-block float-right">
                    <a href="{{ route('users.create') }}" class="btn px-6 btn-sm normal-case btn-primary">Tambah Data</a>
                    <a href="#" class="btn px-6 btn-sm normal-case btn-default btn-import">Import Data</a>
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
                        {{-- <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-circle w-12 h-12"><img
                                                src="https://reqres.in/img/faces/1-image.jpg" alt="Avatar"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Alex</div>
                                    </div>
                                </div>
                            </td>
                            <td>alex@dashwind.com</td>
                            <td>18 Jun 2023</td>
                            <td>
                                <div class="badge badge-primary">Owner</div>
                            </td>
                            <td>5 hr ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-circle w-12 h-12"><img
                                                src="https://reqres.in/img/faces/2-image.jpg" alt="Avatar"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Ereena</div>
                                    </div>
                                </div>
                            </td>
                            <td>ereena@dashwind.com</td>
                            <td>13 Jun 2023</td>
                            <td>
                                <div class="badge badge-secondary">Admin</div>
                            </td>
                            <td>15 min ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-circle w-12 h-12"><img
                                                src="https://reqres.in/img/faces/3-image.jpg" alt="Avatar"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold">John</div>
                                    </div>
                                </div>
                            </td>
                            <td>jhon@dashwind.com</td>
                            <td>08 Jun 2023</td>
                            <td>
                                <div class="badge badge-secondary">Admin</div>
                            </td>
                            <td>20 hr ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-circle w-12 h-12"><img
                                                src="https://reqres.in/img/faces/4-image.jpg" alt="Avatar"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Matrix</div>
                                    </div>
                                </div>
                            </td>
                            <td>matrix@dashwind.com</td>
                            <td>03 Jun 2023</td>
                            <td>
                                <div class="badge">Manager</div>
                            </td>
                            <td>1 hr ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-circle w-12 h-12"><img
                                                src="https://reqres.in/img/faces/5-image.jpg" alt="Avatar"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Virat</div>
                                    </div>
                                </div>
                            </td>
                            <td>virat@dashwind.com</td>
                            <td>29 May 2023</td>
                            <td>
                                <div class="badge badge-accent">Support</div>
                            </td>
                            <td>40 min ago</td>
                        </tr> --}}
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

                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm normal-case btn-warning"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-sm normal-case btn-secondary"><i class="fas fa-trash"></i></button>
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

