@extends('layouts.main.member')

@section('title', 'Permit')

@section('content')

    
    
    <div class="overflow-x-auto">
        <table class="table w-full">
        @csrf
            <!-- head -->
            <thead>
                <tr class="bg-primary text-white">
                    <th>No</th>
                    <th>Nama</th>
                    
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @php
                $number = 1;
            @endphp
            @empty($permits->all())
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
            @endempty           
            @foreach ($permits as $permit)
                <tr>
                    <td>{{ $number }}</td>
                    <td>{{ $permit->title }}</td>
                    <td>

                        @if ($permit->status == 'pending')
                            <div class="badge badge-warning">Pending</div>
                        @elseif ($permit->status == 'approved')
                            <div class="badge badge-primary">Approved</div>
                        @elseif ($permit->status == 'rejected')    
                            <div class="badge badge-secondary">Rejected</div>
                        @endif

                    </td>
                </tr>
                @php
                    $number++;
                @endphp

            @endforeach
                <!-- row 1 -->
                
            </tbody>
        </table>

    </div>

    <div class ="p-8"> {{ $permits->links() }} </div>



@endsection
