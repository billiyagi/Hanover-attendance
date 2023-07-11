<a href="system/dashboard" class="text-2xl text-center pt-8 pb-4 px-2 font-medium block">
    <img src="{{ asset('assets/img/logo/hanover-primary-white.svg') }}" alt="Hanover Light" id="hanoverLogoLight"
        class="px-10">
    <img src="{{ asset('assets/img/logo/hanover-primary-dark.svg') }}" alt="Hanover Dark" id="hanoverLogoDark"
        class="px-10">
</a>
<div class="w-full top-0 left-0 absolute md:h-[500px] mt-32">
    <div class="px-5 text-xs font-bold font-sans text-slate-500">MAIN</div>
    <ul class="menu rounded-box px-5 mb-5">
        <li class="mb-3">
            <a href="{{ url('/admin/dashboard') }}"
                {{ url('/admin/dashboard') == url()->current() ? 'class=bg-base-100' : '' }}>
                <i class="fa-solid fa-gauge-high"></i>
                Dashboard
            </a>
        </li>
        <li class="mb-3">
            <details close
                {{ url('/admin/attendance') == url()->current() || url('/admin/attendance/create') == url()->current() ? 'open' : '' }}>
                <summary>
                    <i class="fa-solid fa-clipboard-user"></i>
                    Absensi
                </summary>
                <ul class="mt-3">
                    <li><a href="{{ url('/admin/attendance') }}"
                            {{ url('/admin/attendance') == url()->current() ? 'class=bg-base-100' : '' }}>Data
                            Absensi</a></li>
                    <li><a href="{{ url('/admin/attendance/create') }}"
                            {{ url('/admin/attendance/create') == url()->current() ? 'class=bg-base-100' : '' }}>Buat
                            Absensi</a></li>
                </ul>
            </details>
        </li>
    </ul>

    <div class="px-5 text-xs font-bold font-sansurl('/admin/attendance') == url()->current() text-slate-500">DATA</div>
    <ul class="menu rounded-box px-5">
        <li class="mb-3">
            <details close
                {{ url('/admin/data') == url()->current() || url('/admin/data/create') == url()->current() ? 'open' : '' }}>
                <summary>
                    <i class="fa-solid fa-database"></i>
                    Data
                </summary>
                <ul class="mt-3">
                    <li><a href="{{ url('/admin/data') }}"
                            {{ url('/admin/data') == url()->current() ? 'class=bg-base-100' : '' }}>Lihat Data</a></li>
                    <li><a href="#" onclick="create_data.showModal()">Buat Data</a></li>
                </ul>
            </details>
        </li>
        <li class="mb-3">
            <details close
                {{ url('/admin/report') == url()->current() || url('/admin/report/create') == url()->current() ? 'open' : '' }}>
                <summary>
                    <i class="fa-solid fa-file-invoice"></i>
                    Laporan
                </summary>
                <ul class="mt-3">
                    <li><a href="{{ url('/admin/report') }}"
                            {{ url('/admin/report') == url()->current() ? 'class=bg-base-100' : '' }}>Data Laporan</a>
                    </li>
                    <li><a href="{{ url('/admin/report/create') }}"
                            {{ url('/admin/report/create') == url()->current() ? 'class=bg-base-100' : '' }}>Buat
                            Laporan</a>
                    </li>
                </ul>
            </details>
        </li>
        <li class="mb-3">
            <a href="{{ route('users.index') }}"
                {{ url('/admin/users') == url()->current() ? 'class=bg-base-100' : '' }}>
                <i class="fa-solid fa-users-gear"></i>
                Pengguna
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ url('/admin/settings') }}"
                {{ url('/admin/settings') == url()->current() ? 'class=bg-base-100' : '' }}>
                <i class="fa-solid fa-gear"></i>

                Pengaturan
            </a>
        </li>
    </ul>

</div>
