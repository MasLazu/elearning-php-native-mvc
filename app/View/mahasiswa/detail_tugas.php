<?php require __DIR__ . "/../layout/mahasiswa/sidebar.php"; ?>
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
        <div class="rounded-lg border-2 w-full p-6">
            <h2 class="text-xl font-semibold mb-1">Deskripsi :</h2>
            <p class="text-lg"><?= $model['tugas']->deskripsi ?></p>
            <h2 class="text-xl font-semibold mb-1 mt-8">Deadline :</h2>
            <p class="text-lg"><?= $model['tugas']->deadline->format('Y-m-d') ?></p>
        </div>
        <?php if (!$model['tugasUser']) { ?>
        <form class="mt-8 rounded-lg border-2 w-full p-6" method="post" enctype="multipart/form-data" action="<?= $model['domain'] . "/mahasiswa/detail_tugas/kumpulkan" ?>">
            <h2 class="text-xl font-semibold mb-6">Kumpulkan :</h2>
            <input type="hidden" name="id" value="<?= $model['tugas']->id ?>" />
            <div class="row flex items-center mb-6">
                <label for="catatan" class="font-semibold text-lg w-24">File</label>
                <input type="file" name="file" class="file-input file-input-bordered grow" />
            </div>
            <div class="row flex items-start">
                <label for="catatan" class="font-semibold text-lg w-24 mt-2">Catatan</label>
                <textarea name="catatan" class="textarea textarea-bordered grow mt-2 mb-3 h-32"></textarea>
            </div>
            <div class="flex justify-end w-full">
                <button class="btn mt-5 px-8">Submit</button>
            </div>
        </form>
        <?php } else { ?>
            <div class="mt-8 rounded-lg border-2 w-full p-6">
                <h2 class="text-xl font-semibold mb-6">Kumpulkan :</h2>
                <div class="row flex items-center mb-6">
                    <label for="catatan" class="font-semibold text-lg w-24">File</label>
                    <a href="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $model['tugasUser']->link_file_pengumpulan) ?>" class="border border-[#d6d8db] h-12 rounded-lg grow px-4 flex items-center cursor-pointer"><i class="fa-regular fa-file-lines mr-3 text-xl"></i><?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public/resources/tugas/pengumpulan/' . $model['tugasUser']->tugas_id . "_" . $model['tugasUser']->user_id . "_" , '\\'], "", $model['tugasUser']->link_file_pengumpulan) ?></a>
                </div>
                <div class="row flex items-start">
                    <label for="catatan" class="font-semibold text-lg w-24 mt-2">Catatan</label>
                    <div class="textarea textarea-bordered grow mt-2 mb-3 h-32"><?= $model['tugasUser']->catatan ?></div>
                </div>
                <div class="flex justify-end w-full">
                    <button class="btn mt-5 px-8">Rubah</button>
                </div>
            </div>
        <?php }?>
    </div>
</main>