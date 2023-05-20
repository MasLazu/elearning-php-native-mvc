<?php require __DIR__ . "/../layout/dosen/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold"><?= $model['datapage']['judul'] ?></h1>
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
        <div class="flex items-center mb-8">
            <div class="avatar mr-4">
                <div class="w-16 rounded-full">
                    <img class="rounded-full" src="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $model['datapage']['link_foto']) ?>" />
                </div>
            </div>
            <div>
                <p class="text-xl font-semibold"><?= $model['datapage']['user_name'] ?></p>
                <p class="text-lg"><?= $model['datapage']['semester'] . ", " . $model['datapage']['kelas_name'] ?></p>
            </div>
        </div>
        <label for="catatan" class="font-semibold text-lg w-24">File :</label>
        <a href="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $model['datapage']['link_file_pengumpulan']) ?>" class="border border-[#d6d8db] h-12 rounded-lg grow px-4 flex items-center cursor-pointer mt-1 mb-6"><i class="fa-regular fa-file-lines mr-3 text-xl"></i><?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public/resources/tugas/pengumpulan/' . $model['datapage']['tugas_id'] . "_" . $model['datapage']['user_id'] . "_" , '\\'], "", $model['datapage']['link_file_pengumpulan']) ?></a>
        <label for="catatan" class="font-semibold text-lg w-24">Catatan :</label>
        <div class="textarea textarea-bordered grow mt-1 mb-3 h-32"><?= $model['datapage']['catatan'] ?></div>
    </div>
</main>