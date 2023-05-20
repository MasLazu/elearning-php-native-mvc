<?php require __DIR__ . "/../layout/dosen/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold"><?= $model['tugas']->judul ?></h1>
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
        <h2 class="text-xl font-semibold mb-1">Deskripsi :</h2>
        <p class="text-lg"><?= $model['tugas']->deskripsi ?></p>
        <h2 class="text-xl font-semibold mb-1 mt-8">Deadline :</h2>
        <p class="text-lg"><?= $model['tugas']->deadline->format('Y-m-d') ?></p>
        <h2 class="text-xl font-semibold mb-2 mt-8">Pengumpulan :</h2>
        <div class="relative overflow-x-auto border sm:rounded-lg">
            <table class="w-full text-left text-gray-500">
                <thead class="text-[#333c4d] uppercase bg-[#e6e6e6]">
                <tr>
                    <th scope="col" class="p-3 text-center">Id</th>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Kelas</th>
                    <th scope="col" class="px-6 py-3">Tanggal</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($model['usersAlreadySubmit'] as $usersAlreadySubmit) { ?>
                    <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer" onclick="window.location='<?= $model['domain'] . "/dosen/tugas_user/?id=" . $usersAlreadySubmit['tugasuser_id'] ?>';">
                        <td class="p-3 text-center"><?= $usersAlreadySubmit['user_id'] ?></td>
                        <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                            <a class="font-semibold"><?= $usersAlreadySubmit['nama'] ?></a>
                        </th>
                        <td class="px-6 py-3"><?= $usersAlreadySubmit['semester_id'] ?> <?= $usersAlreadySubmit['nama_kelas'] ?></td>
                        <td class="p-3"><?= $usersAlreadySubmit['kumpulkan_at'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
