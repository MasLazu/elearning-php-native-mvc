<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Beranda</h1>
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
        <div class="pengumuman-row">
            <div class="flex justify-between mb-2">
                <h2 class="text-xl font-semibold">Pengumuman</h2>
                <label for="my-modal-6" class="btn btn-sm text-xs">Tambah berita</label>
            </div>
            <ul class="space-y-2">
                <?php foreach ($model['pengumuman'] as $pengumuman) { ?>
                <li class="border-2 rounded-md w-full p-3 hover:shadow-md duration-100">
                    <h3 class="text-xl font-semibold mb-3"><?= $pengumuman->judul ?></h3>
                    <p><?= $pengumuman->isi ?></p>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</main>
<input type="checkbox" id="my-modal-6" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <form method="post" action="<?= $model['domain'] . "/admin/buat_pengumuman"?>">
            <h3 class="font-bold text-2xl text-center mb-6">Tambah Kelas</h3>
            <label class="font-semibold mb-1">Judul</label>
            <input type="text" name="judul" placeholder="Judul" class="input input-bordered w-full mb-3" />
            <label class="font-semibold mb-1">Isi</label>
            <textarea class="textarea textarea-bordered w-full h-48" name="isi"></textarea>
            <div class="modal-action flex justify-end">
                <label for="my-modal-6" class="btn btn-accent">Cancel</label>
                <button class="btn btn-active">Tambah</button>
            </div>
        </form>
    </div>
</div>