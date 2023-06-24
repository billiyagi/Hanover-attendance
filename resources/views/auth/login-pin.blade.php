@extends('layouts.main.app')

@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <img src="{{ asset('assets/img/logo/hanover-primary.svg') }}" alt="Hanover Logo" class="w-60">
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Session Status -->

            <form method="POST" action="http://127.0.0.1:8000/login">

                <!-- PIN -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700 text-center mb-3" for="password">
                        Enter your PIN to ACCESS the system
                    </label>

                    <input
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full input text-center text-lg"
                        id="password" type="password" name="password" required="required" autocomplete="current-password"
                        style="outline: none" max="6">

                </div>

                <div class="flex items-center justify-center mt-4">

                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-regular text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-3">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
