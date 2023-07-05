@extends('layouts.main.admin')

@section('title', 'Settings')

@section('content')
    <form method="post" action="/admin/settings/store" class="card w-full p-6 bg-base-300 mt-2">
        @csrf
        <div class="h-full w-full pb-6 bg-base-300">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full undefined">
                    <label class="label">
                        <span class="label-text text-base-content undefined">Company Name</span>
                    </label>
                    <input type="text" placeholder="" class="input  input-bordered w-full" name="company_name"
                        value="{{ old('company_name') }}">
                    @error('company_name')
                        <label class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
                <div class="mt-16">
                    <button class="btn btn-primary float-right">Update</button>
                </div>
            </div>
        </div>
    </form>
@endsection
