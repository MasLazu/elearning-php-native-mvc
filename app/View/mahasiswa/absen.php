<?php require __DIR__ . "/../layout/mahasiswa/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Absen</h1>
        </div>
        <div class="flex-none">
            <h3 class="mr-4 font-semibold">Fattachul Aziz</h3>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="p-6">
        <div class="row flex items-center gap-x-3">
            <label class="label w-32">Tahun Ajaran</label>
            <select class="select select-bordered select-sm">
                <option>2022-2023</option>
                <option>2021-2022</option>
                <option>2020-2021</option>
                <option>2019-2020</option>
            </select>
        </div>
        <div class="row flex items-center gap-x-3">
            <label class="label w-32">Semester</label>
            <select class="select select-bordered select-sm">
                <option value="genap">Genap</option>
                <option value="ganjil">Ganjil</option>
            </select>
        </div>
        <div class="overflow-x-auto mt-6">
            <table class="table w-full text-center">
                <!-- head -->
                <thead>
                <tr>
                    <th rowspan="2" class="pt-3 pb-1">id</th>
                    <th rowspan="2" class="pt-3 pb-1">Mata Kuliah</th>
                    <th colspan="16" class="pt-3 pb-1">Minggu ke</th>
                    <th rowspan="2" class="pt-3 pb-1">% kehadiran</th>
                </tr>
                <tr>
                    <th class="py-2">1</th>
                    <th class="py-2">2</th>
                    <th class="py-2">3</th>
                    <th class="py-2">4</th>
                    <th class="py-2">5</th>
                    <th class="py-2">6</th>
                    <th class="py-2">7/UTS</th>
                    <th class="py-2">8</th>
                    <th class="py-2">9</th>
                    <th class="py-2">10</th>
                    <th class="py-2">11</th>
                    <th class="py-2">12</th>
                    <th class="py-2">13</th>
                    <th class="py-2">14/UAS</th>
                    <th class="py-2">15</th>
                    <th class="py-2">16</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>TI042101</th>
                    <td class="text-start">Algoritma dan Struktur Data</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>S</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>78%</td>
                </tr>
                <tr>
                    <th>TI042102</th>
                    <td class="text-start">Sistem Operasi</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>S</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>85%</td>
                </tr>
                <tr>
                    <th>TI042103</th>
                    <td class="text-start">Basis Data</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>100%</td>
                </tr>
                <tr>
                    <th>TI042104</th>
                    <td class="text-start">Pemrograman Web</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>S</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>100%</td>
                </tr>
                <tr>
                    <th>TI042105</th>
                    <td class="text-start">Matematika 2</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>S</td>
                    <td>H</td>
                    <td>H</td>
                    <td>S</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>88%</td>
                </tr>
                <tr>
                    <th>TI042106</th>
                    <td class="text-start">Kewarganegaraan</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>S</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>H</td>
                    <td>A</td>
                    <td>H</td>
                    <td>H</td>
                    <td>92%</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>