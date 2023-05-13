<?php require __DIR__ . "/../layout/mahasiswa/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto grid grid-cols-2 p-10 gap-10 place-content-start">
    <h1 class="text-4xl font-bold col-span-2 h-12"><?= $model['matakuliah']->nama ?></h1>
    <div class="left">
        <div class="flex items-center mb-6">
            <div class="avatar">
                <div class="w-16 rounded-full">
                    <a href="#">
                        <img src="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $model['dosen']->link_foto) ?>" />
                    </a>
                </div>
            </div>
            <div class="ml-4">
                <a>
                    <p class="text-2xl font-semibold"><?= $model['dosen']->nama ?></p>
                </a>
                <p class="font-semibold"><?= $model['dosen']->email ?></p>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <div>
                <p class="text-lg font-semibold mb-1"><?= $model['matakuliah']->hari ?>, <?= $model['matakuliah']->jam_mulai ?> - <?= $model['matakuliah']->jam_selesai ?></p>
                <p class="text-lg font-semibold"><?= $model['matakuliah']->ruangan ?></p>
            </div>
            <button class="btn"><i class="fa-solid fa-user mr-3"></i>Presensi</button>
        </div>
        <p class="text-lg font-semibold mt-6 mb-2">Tugas</p>
        <div class="rounded-xl border-2 w-full">
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th class="truncate break-all w-24">Tugas</th>
                        <th>Deadline</th>
                    </tr>
                    </thead>
                    <tbody class="text-sm">
                    <tr>
                        <th>1</th>
                        <td>TUGAS INDIVIDU - MATERI DMEOKRASI</td>
                        <td>Jumat, 12 Mei 2023 - 16:00</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>PENGUMPULAN PENUGASAN ANSINKRONUS</td>
                        <td>Kamis, 04 Mei 2023 - 16:00</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>PENGUMPULAN TUGAS KELOMPOK</td>
                        <td>Jumat, 21 April 2023 - 23:59</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>TUGAS INDIVIDU - MATERI DMEOKRASI</td>
                        <td>Jumat, 21 April 2023 - 23:59</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>PENGUMPULAN TUGAS KELOMPOK</td>
                        <td>Jumat, 21 April 2023 - 23:59</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="right">
        <p class="text-lg font-semibold mb-2 mt-3">Peserta</p>
        <div class="rounded-xl border-2">
            <div class="overflow-x-auto w-full">
                <table class="table w-full text-sm">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($model['mahasiswa'] as $mahasiswa) { ?>
                        <tr>
                            <th>
                                <p><?= $mahasiswa->id ?></p>
                            </th>
                            <td>
                                <a href="#" class="font-bold"><?= $mahasiswa->nama ?></a>
                            </td>
                            <td><?= $mahasiswa->email ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
