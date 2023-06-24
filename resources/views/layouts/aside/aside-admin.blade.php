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
            <a class="bg-base-100">
                <i class="fa-solid fa-gauge-high"></i>
                Dashboard
            </a>
        </li>
        <li class="mb-3">
            <details close>
                <summary>
                    <i class="fa-solid fa-clipboard-user"></i>
                    Absensi
                </summary>
                <ul class="mt-3">
                    <li><a href="">Data Absensi</a></li>
                    <li><a>Buat Absensi</a></li>
                </ul>
            </details>
        </li>
    </ul>

    <div class="px-5 text-xs font-bold font-sans text-slate-500">DATA</div>
    <ul class="menu rounded-box px-5">
        <li class="mb-3">
            <details close>
                <summary>
                    <i class="fa-solid fa-database"></i>
                    Data
                </summary>
                <ul class="mt-3">
                    <li><a href="">Buat Data</a></li>
                    <li><a href="">Pegawai</a></li>
                </ul>
            </details>
        </li>
        <li class="mb-3">
            <details close>
                <summary>
                    <i class="fa-solid fa-file-invoice"></i>
                    Laporan
                </summary>
                <ul class="mt-3">
                    <li><a href="">Data Laporan</a></li>
                    <li><a>Buat Laporan</a></li>
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
            <a>
                <i class="fa-solid fa-gear"></i>

                Settings
            </a>
        </li>
    </ul>

</div>
