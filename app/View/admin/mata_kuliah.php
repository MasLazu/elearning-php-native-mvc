<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Mata Kuliah</h1>
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
        <form action="#">
            <div class="mb-10 flex w-full">
                <select name="from" class="select bg-[#1f2937] rounded-r-none text-white focus:outline-none">
                    <option>nama</option>
                    <option>email</option>
                </select>
                <input type="text" name="search" placeholder="Search…" class="input input-bordered rounded-none border-x-0 grow" />
                <button class="btn btn-square rounded-l-none px-8">
                    <i class="fa-solid fa-magnifying-glass text-xl"></i>
                </button>
            </div>
        </form>
        <div class=" grid grid-cols-3 gap-6">
            <a href="<?= $model['domain'] . "/admin/tambah_mata_Kuliah" ?>" class="absolute right-12 bottom-12 bg-[#1f2937] rounded-full h-16 w-16 grid place-content-center cursor-pointer">
                <i class="fa-solid fa-plus text-4xl text-white"></i>
            </a>
            <?php foreach ($model['matakuliah'] as $matakuliah) { ?>
            <a href="<?= $model['domain'] . "/admin/mata_kuliah_detail/?id=" . $matakuliah['id'] ?>" class="border-2 rounded-lg hover:shadow-md duration-100">
                <div class="header p-7 bg-[#1f2937] rounded-t-lg cursor-pointer">
                    <h4 class="text-2xl font-semibold text-center text-white"><?= $matakuliah['nama'] ?></h4>
                </div>
                <div class="info p-6">
                    <p class="text-xl mb-4 font-semibold"><?= $matakuliah['nama_dosen'] ?></p>
                    <p class="text-lg"><?= $matakuliah['hari'] ?>, <?= $matakuliah['jam_mulai'] ?> - <?= $matakuliah['jam_selesai'] ?></p>
                    <p class="text-lg"><?= $matakuliah['ruangan'] ?></p>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
</main>