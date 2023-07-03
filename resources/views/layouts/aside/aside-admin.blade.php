<a href="{{ url('/admin/data/create') }}" class="text-2xl text-center pt-8 pb-4 px-2 font-medium block">
    <img src="{{ asset('assets/img/logo/hanover-primary-white.svg') }}" alt="Hanover Light" id="hanoverLogoLight"
        class="px-10">
    <img src="{{ asset('assets/img/logo/hanover-primary-dark.svg') }}" alt="Hanover Dark" id="hanoverLogoDark"
        class="px-10">
</a>
<div class="w-full top-0 left-0 absolute md:h-[500px] mt-32">
    <div class="px-5 text-xs font-bold font-sans text-slate-500">MAIN</div>
    <ul class="menu rounded-box px-5 mb-5">
        <li class="mb-3">
            <a href="/admin/dashboard" {{ url()->current() == url('/admin/dashboard') ? 'class=bg-base-100' : '' }}>
                <i class="fa-solid fa-gauge-high"></i>
                Dashboard
            </a>
        </li>
        <li>
            <details close
                {{ url()->current() == url('/admin/attendance') || url()->current() == url('/admin/attendance/create') ? 'open' : '' }}>

                <summary
                    {{ url()->current() == url('/admin/attendance') || url()->current() == url('/admin/attendance/create') ? 'class=bg-base-100' : '' }}>
                    <i class="fa-solid fa-clipboard-user"></i>
                    Absensi
                </summary>
                <ul class="mt-3">
                    <li><a href="{{ url('/admin/attendance') }}"
                            {{ url()->current() == url('/admin/attendance') ? 'class=bg-base-100' : '' }}>Data
                            Absensi</a></li>
                    <li><a href="{{ url('/admin/attendance/create') }}"
                            {{ url()->current() == url('/admin/attendance/create') ? 'class=bg-base-100' : '' }}>Buat
                            Absensi</a></li>
                </ul>
            </details>
        </li>
    </ul>

    <div class="px-5 text-xs font-bold font-sans text-slate-500">DATA</div>
    <ul class="menu rounded-box px-5">
        <li class="mb-3">
            <details close {{ url()->current() == url('/admin/data') ? 'open' : '' }}>
                <summary {{ url()->current() == url('/admin/data') ? 'class=bg-base-100' : '' }}>
                    <i class="fa-solid fa-database"></i>
                    Data
                </summary>
                <ul class="mt-3">
                    <li>
                        <a onclick="create_data.showModal()">Buat Data</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/data') }}"
                            {{ url()->current() == url('/admin/data') ? 'class=bg-base-100' : '' }}>Seluruh Data</a>
                    </li>
                </ul>
            </details>
        </li>
        <li class="mb-3">
            <details close
                {{ url()->current() == url('/admin/report') || url()->current() == url('/admin/report/create') ? 'open' : '' }}>
                <summary {{ url()->current() == url('/admin/report') ? 'class=bg-base-100' : '' }}>
                    <i class="fa-solid fa-file-invoice"></i>
                    Laporan
                </summary>
                <ul class="mt-3">
                    <li><a href="{{ url('/admin/report') }}"
                            {{ url()->current() == url('/admin/report') ? 'class=bg-base-100' : '' }}>Data
                            Laporan</a></li>
                    <li><a href="{{ url('/admin/report/create') }}"
                            {{ url()->current() == url('/admin/report/create') ? 'class=bg-base-100' : '' }}>Buat
                            Laporan</a></li>
                </ul>
            </details>
        </li>
        <li class="mb-3">
            <a>
                <i class="fa-solid fa-users-gear"></i>
                Users
            </a>
        </li>
        <li class="mb-3">
            <a href="/admin/settings">
                <i class="fa-solid fa-gear"></i>
                Settings
            </a>
        </li>
    </ul>

</div>
