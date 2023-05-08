<?php require __DIR__ . "/../layout/mahasiswa/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Jadwal Kuliah</h1>
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
            <table class="table w-full">
                <!-- head -->
                <thead>
                <tr>
                    <th>Hari</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Senin</th>
                    <td>Matematika 2</td>
                    <td>Ira Prasetyaningrum</td>
                    <td>14:40 - 16:20</td>
                    <td>PS-03.17</td>
                </tr>
                <tr>
                    <th>Senin</th>
                    <td>Basis Data</td>
                    <td>Tessy Badriah</td>
                    <td>08:00 - 09:40</td>
                    <td>B 202</td>
                </tr>
                <tr>
                    <th>Selasa</th>
                    <td>Praktikum Pemrograman web</td>
                    <td>Mu'arifin</td>
                    <td>10:30 - 13:50</td>
                    <td>C 303</td>
                </tr>
                <tr>
                    <th>Selasa</th>
                    <td>Praktikum Sistem Operasi</td>
                    <td>Nur Rosyid Mubtadai</td>
                    <td>08:00 - 10:30</td>
                    <td>C 203</td>
                </tr>
                <tr>
                    <th>Rabu</th>
                    <td>Praktikum Algoritma dan Struktur Data</td>
                    <td>Umi Sa'adah</td>
                    <td>08:00 - 10:30</td>
                    <td>C 102</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>