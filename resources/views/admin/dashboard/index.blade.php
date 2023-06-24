@extends('layouts.main.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <div class="stats shadow bg-primary text-white">

            <div class="stat">
                <div class="stat-figure text-info">
                    <i class="fa-solid fa-blog text-4xl"></i>
                </div>
                <div class="font-bold">Blog Posts</div>
                <div class="stat-value my-3">24</div>
                <div class="stat-desc text-gray-100">Total of blog in entire system</div>
            </div>

        </div>
        <div class="stats shadow bg-accent text-white">

            <div class="stat">
                <div class="stat-figure text-violet-100">
                    <i class="fa-solid fa-code text-4xl"></i>
                </div>
                <div class="font-bold">Projects</div>
                <div class="stat-value my-3">7</div>
                <div class="stat-desc text-gray-100">All the project that've been added</div>
            </div>

        </div>
        <div class="stats shadow bg-gradient-to-r from-cyan-500 to-blue-500 text-white">

            <div class="stat">
                <div class="stat-figure text-primary">
                    <i class="fa-solid fa-folder-open text-4xl"></i>
                </div>
                <div class="font-bold">Total Page Views</div>
                <div class="stat-value my-3">89,400</div>
                <div class="stat-desc text-gray-100">21% more than last month</div>
            </div>

        </div>
    </div>

    <div class="card bg-base-300 my-8">
        <div class="card-body">
            <canvas id="visitor"></canvas>
        </div>
    </div>

    <div class="card w-full p-6 mt-2 bg-base-300 my-8">
        <div class="text-xl font-semibold inline-block">Active Members<div class="inline-block float-right">
                <div class="inline-block float-right"><button class="btn px-6 btn-sm normal-case btn-primary">Invite
                        New</button></div>
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

    <div class="card w-full p-6 bg-base-300 mt-2">
        <div class="text-xl font-semibold ">Profile Settings</div>
        <div class="divider mt-2"></div>
        <div class="h-full w-full pb-6 bg-base-300">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full undefined">
                    <label class="label">
                        <span class="label-text text-base-content undefined">Name</span>
                    </label>
                    <input type="text" placeholder="" class="input  input-bordered w-full " value="Alex">
                    <label class="label">
                        <span class="label-text-alt text-red-600">Bottom Left label</span>
                        <span class="label-text-alt">Bottom Right label</span>
                    </label>
                </div>
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">Email Id</span></label><input type="text"
                        placeholder="" class="input  input-bordered w-full " value="alex@dashwind.com"></div>
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">Title</span></label><input type="text"
                        placeholder="" class="input  input-bordered w-full " value="UI/UX Designer"></div>
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">Place</span></label><input type="text"
                        placeholder="" class="input  input-bordered w-full " value="California"></div>
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">About</span></label>
                    <textarea class="textarea textarea-bordered w-full" placeholder="">Doing what I love, part time traveller</textarea>
                </div>
            </div>
            <div class="divider"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">Language</span></label><input type="text"
                        placeholder="" class="input  input-bordered w-full " value="English"></div>
                <div class="form-control w-full undefined"><label class="label"><span
                            class="label-text text-base-content undefined">Timezone</span></label><input type="text"
                        placeholder="" class="input  input-bordered w-full " value="IST"></div>
                <div class="form-control w-full undefined"><label class="label cursor-pointer"><span
                            class="label-text text-base-content undefined">Sync Data</span><input type="checkbox"
                            class="toggle" checked=""></label></div>
            </div>
            <div class="mt-16"><button class="btn btn-primary float-right">Update</button></div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        const ctx = document.getElementById('visitor');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'Orange', 'June', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: ['# Pengunjung'],
                    data: [12, 6, 2, 10],
                    borderWidth: 0,
                    borderRadius: 5,
                    backgroundColor: ['#54B435', '#E57C23', '#B70404'],
                    borderSkipped: false,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
