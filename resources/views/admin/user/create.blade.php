<!-- resources/views/users/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full sm:max-w-md bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-semibold mb-6">Tambah Pengguna Baru</h2>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nama</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700">Peran</label>
                <select name="role" id="role" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-md">Tambahkan</button>
            </div>
        </form>
    </div>
</div>
@endsection
