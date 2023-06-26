@extends('layouts.main.admin')

@section('content')

<div class="card w-full p-6 mt-2 bg-base-300 my-8">
        <div class="text-xl font-semibold inline-block">Laporan<div class="inline-block float-right">
                <div class="inline-block float-right"><button class="btn px-6 btn-sm normal-case btn-primary">Laporan
                        Baru</button></div>
            </div>
        </div>
        <div class="divider mt-2"></div>
        <div class="h-full w-full pb-6 bg-base-300">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr class="bg-base-200">
                            <th>Name</th>
                            <th>Email Id</th>
                            <th>Joined On</th>
                            <th>Role</th>
                            <th>Last Active</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-circle w-12 h-12"><img
                                                src="https://reqres.in/img/faces/1-image.jpg" alt="Avatar"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Alex</div>
                                    </div>
                                </div>
                            </td>
                            <td>alex@dashwind.com</td>
                            <td>18 Jun 2023</td>
                            <td>
                                <div class="badge badge-primary">Owner</div>
                            </td>
                            <td>5 hr ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-circle w-12 h-12"><img
                                                src="https://reqres.in/img/faces/2-image.jpg" alt="Avatar"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Ereena</div>
                                    </div>
                                </div>
                            </td>
                            <td>ereena@dashwind.com</td>
                            <td>13 Jun 2023</td>
                            <td>
                                <div class="badge badge-secondary">Admin</div>
                            </td>
                            <td>15 min ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-circle w-12 h-12"><img
                                                src="https://reqres.in/img/faces/3-image.jpg" alt="Avatar"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold">John</div>
                                    </div>
                                </div>
                            </td>
                            <td>jhon@dashwind.com</td>
                            <td>08 Jun 2023</td>
                            <td>
                                <div class="badge badge-secondary">Admin</div>
                            </td>
                            <td>20 hr ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-circle w-12 h-12"><img
                                                src="https://reqres.in/img/faces/4-image.jpg" alt="Avatar"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Matrix</div>
                                    </div>
                                </div>
                            </td>
                            <td>matrix@dashwind.com</td>
                            <td>03 Jun 2023</td>
                            <td>
                                <div class="badge">Manager</div>
                            </td>
                            <td>1 hr ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-circle w-12 h-12"><img
                                                src="https://reqres.in/img/faces/5-image.jpg" alt="Avatar"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Virat</div>
                                    </div>
                                </div>
                            </td>
                            <td>virat@dashwind.com</td>
                            <td>29 May 2023</td>
                            <td>
                                <div class="badge badge-accent">Support</div>
                            </td>
                            <td>40 min ago</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-circle w-12 h-12"><img
                                                src="https://reqres.in/img/faces/6-image.jpg" alt="Avatar"></div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Miya</div>
                                    </div>
                                </div>
                            </td>
                            <td>miya@dashwind.com</td>
                            <td>19 May 2023</td>
                            <td>
                                <div class="badge badge-accent">Support</div>
                            </td>
                            <td>5 hr ago</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection