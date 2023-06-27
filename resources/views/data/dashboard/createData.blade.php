@extends('layouts.main.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="card w-full p-6 bg-base-300 mt-2">
        <div class="text-xl font-semibold ">Tambah Data</div>
        <div class="divider mt-2"></div>

         <form action="{{url('admin/storeData')}}" method="POST" enctype="multypart/form-data">
        {{csrf_field()}}
        <div class="h-full w-full pb-6 bg-base-300">
                <div class="form-control w-full undefined">
                    <label class="label">
                        <span class="label-text text-base-content undefined">Name</span>
                    </label>
                    <input type="text" class="input  input-bordered w-full " name="name">
                </div>
            <div class="mt-16"><button class="btn btn-primary float-right">Tambah</button></div>

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
