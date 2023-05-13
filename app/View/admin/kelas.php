<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Kelas</h1>
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
        <div class="grid grid-cols-3 gap-6">
            <label for="my-modal"  class="absolute right-12 bottom-12 bg-[#1f2937] rounded-full h-16 w-16 grid place-content-center cursor-pointer shadow-xl">
                <i class="fa-solid fa-plus text-4xl text-white"></i>
            </label>
            <?php foreach ($model['kelas'] as $kelas) { ?>
            <a href="<?= $model['domain'] . "/admin/kelas_detail/?id=" . $kelas->id ?>" class="border-2 rounded-lg hover:shadow-md duration-100 hover:cursor-pointer">
                <div class="header p-6 bg-[#1f2937] rounded-t-lg cursor-pointer">
                    <h4 class="text-3xl font-semibold text-center text-white"><?= $kelas->nama ?></h4><!--format : semester kelas-->
                </div>
                <div class="member grid grid-cols-2 px-4 py-6">
                    <div class="col-1">
                        <p>- Yanto Kucul</p>
                        <p>- Puan Maharani</p>
                        <p>- Agus Tukang Las</p>
                    </div>
                    <div class="col-2">
                        <p>- Agus Tukang Las</p>
                        <p>- Puan Maharani</p>
                        <p>- Yanto Kucul</p>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
</main>
<input type="checkbox" id="my-modal" class="modal-toggle" />
<div class="modal">
    <form class="modal-box" action="<?= $model['domain'] . "/admin/tambah_kelas" ?>" method="post">
        <h3 class="font-bold text-2xl text-center heading-modal mb-8">Tambah Kelas</h3>
        <div class="flex items-center input-row my-3">
            <label for="nama" class="w-24">Nama kelas</label>
            <input type="text" name="nama" placeholder="Type here" class="input input-bordered grow" />
        </div>
        <div class="flex items-center input-row my-3">
            <label for="jurusan_id" class="w-24">Jurusan</label>
            <select name="jurusan_id" class="select select-bordered grow" required>
                <option disabled selected value="">pilih jurusan</option>
                <option value="1">Teknik Informatika</option>
                <option value="2">Sains Data</option>
            </select>
        </div>
        <div class="modal-action">
            <label for="my-modal" class="btn btn-accent">Cancel</label>
            <button class="btn">Submit</button>
        </div>
    </form>
</div>