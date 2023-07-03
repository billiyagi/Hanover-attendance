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
    {{-- @vite('resources/css/app.css') --}}
</head>

<body class="bg-slate-100">
    <main class="flex justify-center h-screen items-center px-5 md:px-0">

        {{-- PC Version --}}
        <div class="block md:flex">

            <!-- needed to by the camera stream -->
            <div id="frame"
                class="md:rounded-2xl overflow-hidden w-full md:w-[647px] bg-white relative h-full md:h-auto">

                @yield('content')
            </div>

            {{-- Menu Desktop --}}
            @include('layouts.aside.aside-member')

        </div>

        {{-- Mobile Menu --}}
        @include('layouts.menu.menu-member-mobile')
    </main>


    <dialog id="logout_modal" class="modal modal-bottom sm:modal-middle">
        <form method="dialog" class="modal-box">
            <h3 class="font-bold text-lg">Are you sure want to exit from the system?</h3>
            <p class="py-4">Is there any changes will not save.</p>
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Tutup</button>
                <a href="{{ route('logout') }}" class="btn bg-red-600 text-white hover:bg-red-800">Sign Out</a>
            </div>
        </form>
    </dialog>


    {{-- Feedback Error Camera Permission --}}
    <input type="checkbox" id="feedbackErrorModal" class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-lg" id="feedbackErrorModalTitle"></h3>
            <p class="py-4" id="feedbackErrorModalText"></p>
            <div class="modal-action">
                <label for="feedbackErrorModal" class="btn">Tutup</label>
            </div>
        </div>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    {{-- Script --}}
    @yield('script')
    <x-notify::notify />
    @notifyJs
</body>

</html>
