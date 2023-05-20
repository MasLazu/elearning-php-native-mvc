<?php require __DIR__ . "/../layout/dosen/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Buat Tugas <?= $model['matakuliah']->nama ?></h1>
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
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $model['matakuliah']->id ?>" class="input input-bordered grow" />
            <div class="row flex items-center">
                <div class="flex justify-between items-center w-32">
                    <label class="text-lg font-semibold">Judul</label>
                    <label class="text-lg font-semibold mr-4">:</label>
                </div>
                <input type="text" name="judul" class="input input-bordered grow" required/>
            </div>
            <div class="row flex items-center my-6">
                <div class="flex justify-between items-center w-32">
                    <label class="text-lg font-semibold">Deadline</label>
                    <label class="text-lg font-semibold mr-4">:</label>
                </div>
                <input type="date" name="deadline" class="input input-bordered grow" required/>
            </div>
            <div class="row flex items-start my-6">
                <div class="flex justify-between items-center w-32">
                    <label class="text-lg font-semibold">Deskripsi</label>
                    <label class="text-lg font-semibold mr-4">:</label>
                </div>
                <textarea name="deskripsi" class="textarea textarea-bordered grow h-48" required></textarea>
            </div>
            <div class="row flex items-center my-6">
                <div class="flex justify-between items-center w-32">
                    <label class="text-lg font-semibold">Lampiran</label>
                    <label class="text-lg font-semibold mr-4">:</label>
                </div>
                <input type="file" name="lampiran" class="file-input file-input-bordered grow" required/>
            </div>
            <div class="flex justify-end">
                <button class="btn px-8">Buat</button>
            </div>
        </form>
    </div>
</main>