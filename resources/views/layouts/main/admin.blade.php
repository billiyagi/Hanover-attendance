<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.3/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @notifyCss
    <title>Hanover :: @yield('title')</title>
    @yield('style')

    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    {{-- Aside --}}
    <aside class="bg-base-200 h-full w-60 fixed left-0 top-0 hidden md:block">
        <div class="w-full relative">
            @include('layouts.aside.aside-admin')
        </div>
    </aside>

    {{-- Navbar --}}
    @include('layouts.navbar.navbar-admin')

    <main class="ms-0 md:ms-60 px-4 md:px-10 pb-10">
        {{-- Main Content --}}
        @yield('content')

    </main>

    {{-- Footer --}}
    @include('layouts.footer.footer-admin')

    <dialog id="logout_modal" class="modal modal-bottom sm:modal-middle">
        <form method="dialog" class="modal-box">
            <h3 class="font-bold text-lg">Are you sure want to exit from the system?</h3>
            <p class="py-4">Is there any changes will not save.</p>
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
                <a href="{{ route('logout') }}" class="btn bg-red-600 text-white hover:bg-red-800">Sign Out</a>
            </div>
        </form>
    </dialog>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Script --}}
    @yield('script')
    <x-notify::notify />
    @notifyJs
</body>

</html>
