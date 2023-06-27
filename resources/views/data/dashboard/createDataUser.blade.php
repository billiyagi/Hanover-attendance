@extends('layouts.main.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="card w-full p-6 mt-2 bg-base-300 my-8">
        <div class="text-xl font-semibold inline-block">{{ $data->name }}<div class="inline-block float-right">
                <div class="inline-block float-right"><button class="btn px-6 btn-sm normal-case btn-primary">Invite
                        New</button></div>
            </div>
        </div>
        <div class="divider mt-2"></div>
        <div class="h-full w-full pb-6 bg-base-300">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr class="bg-base-200">
                            <th>
                                <input type="checkbox" name="" id="">
                            </th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Nip</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>avatar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u )
                            @if ($u -> id)
                                
                            @endif
                            
                                <tr>
                                    <td>
                                        <input type="checkbox" name="u[]" value="{{ $u->id }}">
                                    </td>
                                    <td>
                                        <div class="flex items-center space-x-3">
                                            <div>
                                                <div class="font-bold">{{ $u->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $u->username }}</td>
                                    <td>{{ $u->nip }}</td>
                                    <td> 
                                        <div class="badge badge-primary">{{ $u->role_id}}</div>
                                    </td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        <div class="avatar">
                                            <div class="mask mask-circle w-12 h-12">
                                                <img src="https://reqres.in/img/faces/1-image.jpg" alt="Avatar">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        const ctx = document.getElementById('visitor');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'Orange', 'June', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: ['# Pengunjung'],
                    data: [12, 6, 2, 10],
                    borderWidth: 0,
                    borderRadius: 5,
                    backgroundColor: ['#54B435', '#E57C23', '#B70404'],
                    borderSkipped: false,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
