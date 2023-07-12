<div id="menuDesktop" class="ms-5 flex-col hidden md:flex">
    <a href="{{ url('/member/present') }}"
        class="btn w-28 h-28 mb-3 bg-white border-none shadow-sm hover:shadow-md hover:bg-white ">
        <div>
            <div class="rounded-full bg-indigo-500 px-4 py-3">
                <i class="fa-solid fa-camera text-xl text-white"></i>
            </div>
            <div class="mt-2">Absen</div>
        </div>
    </a>
    <a href="{{ url('/member/data') }}"
        class="btn w-28 h-28 mb-3 bg-white border-none shadow-sm hover:shadow-md hover:bg-white">
        <div>
            <div class="rounded-full bg-indigo-500 px-[17px] py-3">
                <i class="fa-regular fa-calendar-days text-xl text-white"></i>
            </div>
            <div class="mt-2">Data</div>
        </div>
    </a>
    <div class="dropdown dropdown-right">
        <label tabindex="0" class="btn w-28 h-28 mb-3 bg-white border-none shadow-sm hover:shadow-md hover:bg-white">
            <div>
                <div class="rounded-full bg-indigo-500 px-[14px] py-3">
                    <i class="fa-solid fa-people-arrows text-xl text-white"></i>
                </div>
                <div class="mt-2">Izin</div>
            </div>
        </label>
        <ul tabindex="0" class="dropdown-content z-[1] menu ms-2 p-2 shadow rounded-box w-52 bg-white">
            <li><a href="{{ url('/member/permit') }}">Keterangan Izin</a></li>
            <li><a href="{{ url('/member/permit/sakit') }}">Sakit</a></li>
            <li><a href="{{ url('/member/permit/cuti') }}">Cuti</a></li>
            <li><a href="{{ url('/member/permit/other') }}">Lainnya</a></li>
        </ul>
    </div>
    <a href="{{ url('/member/account') }}"
        class="btn w-28 h-28 bg-white border-none shadow-sm hover:shadow-md hover:bg-white">
        <div>
            <div class="avatar">
                <div class="w-14 rounded-full">
                    <img src="https://avatars.githubusercontent.com/u/89958256?v=4" />
                </div>
            </div>
            <div class="mt-2">Akun</div>
        </div>
    </a>
</div>
