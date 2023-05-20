<?php require __DIR__ . "/../layout/mahasiswa/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Tugas</h1>
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
        <form class="row flex items-center gap-x-3" method="get">
            <label class="label mr-2 text-lg">Mata Kuliah</label>
            <select class="select select-bordered" name="id" onchange="this.form.submit()">
                <option value="" <?= isset($_GET['id']) ? "" : "selected" ?>>Semua</option>
                <?php foreach ($model['matakuliah'] as $matakuliah) { ?>
                <option value="<?= $matakuliah['id'] ?>" <?= isset($_GET['id']) && $matakuliah['id'] == $_GET['id'] ? "selected" : "" ?>><?= $matakuliah['nama'] ?></option>
                <?php } ?>
            </select>
        </form>
        <div class="row flex grid grid-cols-2 gap-6 mt-6 items-start">
            <?php foreach ($model['tugas'] as $tugas) { ?>
            <div class="card-tugas border-2 rounded-xl p-6 hover:shadow-md">
                <h3 class="text-xl font-semibold mb-3"><?= $tugas->judul ?></h3>
                <p class="h-24 overflow-hidden"><?= $tugas->deskripsi ?></p>
                <p class="mt-2">Deadline : <?= $tugas->deadline->format('Y-m-d') ?></p>
                <div class="flex justify-end mt-4">
                    <a href="<?= $model['domain'] ?>/mahasiswa/detail_tugas/?id=<?= $tugas->id ?>" class="btn">Detail <i class="fa-solid fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</main>