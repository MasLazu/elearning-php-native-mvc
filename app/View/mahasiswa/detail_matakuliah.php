<?php require __DIR__ . "/../layout/mahasiswa/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold"><?= $model['matakuliah']->nama ?></h1>
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
    <div class=" grid grid-cols-2 p-10 gap-10 place-content-start">
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
            <div class="relative overflow-x-auto border sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-[#333c4d] uppercase bg-[#e6e6e6]">
                    <tr>
                        <th scope="col" class="p-4">id</th>
                        <th scope="col" class="px-6 py-3">Tugas</th>
                        <th scope="col" class="px-6 py-3">Deadline</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model['tugas'] as $tugas) { ?>
                        <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer" onclick="window.location='<?= $model['domain'] . "/mahasiswa/detail_tugas/?id=" . $tugas->id ?>';">
                            <td class="w-4 p-4"><?= $tugas->id ?></td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <a class="font-semibold"><?= $tugas->judul ?></a>
                            </th>
                            <td class="px-6 py-4"><?= $tugas->deadline->format('Y-m-d') ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="right">
            <p class="text-lg font-semibold mb-2 mt-3">Peserta</p>
            <div class="relative overflow-x-auto border sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-[#333c4d] uppercase bg-[#e6e6e6]">
                    <tr>
                        <th scope="col" class="p-4">id</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model['mahasiswa'] as $mahasiswa) { ?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 p-4"><?= $mahasiswa->id ?></td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <a class="font-semibold"><?= $mahasiswa->nama ?></a>
                            </th>
                            <td class="px-6 py-4"><?= $mahasiswa->email ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
<!--            <div class="rounded-xl border-2">-->
<!--                <div class="overflow-x-auto w-full">-->
<!--                    <table class="table w-full text-sm">-->
<!--                        <thead>-->
<!--                        <tr>-->
<!--                            <th>Id</th>-->
<!--                            <th>Nama</th>-->
<!--                            <th>Email</th>-->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!--                            --><?php //foreach ($model['mahasiswa'] as $mahasiswa) { ?>
<!--                            <tr>-->
<!--                                <th>-->
<!--                                    <p>--><?php //= $mahasiswa->id ?><!--</p>-->
<!--                                </th>-->
<!--                                <td>-->
<!--                                    <a href="#" class="font-bold">--><?php //= $mahasiswa->nama ?><!--</a>-->
<!--                                </td>-->
<!--                                <td>--><?php //= $mahasiswa->email ?><!--</td>-->
<!--                            </tr>-->
<!--                            --><?php //} ?>
<!--                        </tbody>-->
<!--                    </table>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</main>
