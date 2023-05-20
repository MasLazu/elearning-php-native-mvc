<?php require __DIR__ . "/../layout/mahasiswa/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Absen</h1>
        </div>
        <div class="flex-none">
            <h3 class="mr-4 font-semibold"><?= $model['user']->nama ?></h3>
            <a href="<?= $model['domain'] . "/user_profile" ?>" tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $model['user']->link_foto) ?>" />
                </div>
            </a>
        </div>
    </div>
    <div class="p-10">
        <div class="row flex items-center gap-x-3">
            <label class="label w-32">Semester</label>
            <select class="select select-bordered select-sm" required>
                <option value="" selected disabled>Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
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