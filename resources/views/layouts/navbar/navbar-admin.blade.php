<nav class="ms-0 md:ms-60 px-4 md:px-10 pt-4 md:pt-10 mb-6 md:mb-14 flex justify-between items-center">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />

    {{-- Title Page --}}
    <div class="flex items-center">
        <label for="my-drawer-3" class="btn btn-square btn-ghost flex md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="inline-block w-6 h-6 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </label>
        <div class="block">
            <h1 class="text-xl md:text-3xl font-bold text-light">@yield('title')</h1>
        </div>
    </div>

    {{-- Notification & system stats --}}
    <div class="flex items-center">
        <button class="btn me-1 md:me-4">
            <label class="swap swap-rotate">

                <!-- this hidden checkbox controls the state -->
                <input type="checkbox" id="modeChecked" />

                <!-- sun icon -->
                <i class="fa-solid fa-sun swap-on text-lg" id="ligthButton"></i>

                <!-- moon icon -->
                <i class="fa-solid fa-moon swap-off text-lg" id="DarkButton"></i>

            </label>
        </button>

        {{-- Profile Dropdown --}}
        <div class="dropdown dropdown-bottom dropdown-end">
            <label tabindex="0" class="avatar online">
                <div class="w-12 h-12 rounded-full">
                    <img src="https://avatars.githubusercontent.com/u/89958256?v=4" />
                </div>
            </label>
            <div tabindex="0"
                class="dropdown-content card card-compact w-64 p-2 shadow bg-base-200 text-primary-content z-10">
                <div class="p-4">
                    <span class="block">{{ Auth::user()->name }}</span>
                    <small class="text-ghost">{{ '@' . Auth::user()->username }}</small>
                </div>
                <ul class="menu rounded-box">
                    <li class="mb-2">
                        <a>
                            <i class="fa-solid fa-circle-user"></i>

                            Profile
                        </a>
                    </li>
                    <li>
                        <a class="bg-red-600 hover:bg-red-800" onclick="logout_modal.showModal()">
                            <i class="fa-solid fa-right-from-bracket"></i>

                            Log out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="drawer-side z-50">
        <label for="my-drawer-3" class="drawer-overlay"></label>
        <div class="menu p-4 w-80 h-full bg-base-200 overflow-auto">
            @include('layouts.aside.aside-admin')
        </div>

    </div>
</nav>
