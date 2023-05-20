<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
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
    <div class="p-10">
        <div class="flex items-center mb-6">
            <div class="avatar">
                <div class="w-16 rounded-full">
                    <a href="<?= $model['domain'] . "/admin/user_detail/?id=" . $model['dosen']->id ?>">
                        <img src="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $model['dosen']->link_foto) ?>" />
                    </a>
                </div>
            </div>
            <div class="ml-4">
                <a href="<?= $model['domain'] . "/admin/user_detail/?id=" . $model['dosen']->id ?>">
                    <p class="text-2xl font-semibold"><?= $model['dosen']->nama ?></p>
                </a>
                <p class="font-semibold"><?= $model['dosen']->email ?></p>
            </div>
        </div>
        <p class="text-xl font-semibold mb-1"><span class="font-bold"><?= $model['matakuliah']->hari ?></span>, <?= $model['matakuliah']->jam_mulai ?> - <?= $model['matakuliah']->jam_selesai ?></p>
        <p class="text-xl font-semibold mb-4"><?= $model['matakuliah']->ruangan ?></p>
        <div class="keterangan-table flex justify-between mb-1">
            <p class="text-lg font-semibold">Kelas yang mengikuti : </p>
            <label for="my-modal" class="btn btn-sm text-xs">Tambah kelas</label>
        </div>
        <div class="relative overflow-x-auto border sm:rounded-lg">
            <table class="w-full text-left text-gray-500">
                <thead class="text-[#333c4d] uppercase bg-[#e6e6e6]">
                <tr>
                    <th scope="col" class="p-4">Id</th>
                    <th scope="col" class="px-6 py-3">Kelas</th>
                    <th scope="col" class="px-6 py-3">Jurusan</th>
                    <th scope="col" class="px-6 py-3 text-center">Semester</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($model['kelas'] as $kelas) { ?>
                    <tr class="g-white border-b hover:bg-gray-50 cursor-pointer" onclick="window.location='<?= $model['domain'] . "/admin/kelas_detail/?id=" . $kelas['id'] . "&semester=" . $kelas['semester'] ?>';">
                        <th class="p-4"><?= $kelas['id'] ?></th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><a href="<?= $model['domain'] . "/admin/kelas_detail/?id=" . $kelas['id'] . "&semester=" . $kelas['semester'] ?>"><?= $kelas['nama'] ?></a></th>
                        <td class="px-6 py-4"><?= $kelas['jurusan'] ?></td>
                        <td class="px-6 py-4 text-center"><?= $kelas['semester'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<input type="checkbox" id="my-modal" class="modal-toggle" />
<div class="modal">
    <form class="modal-box" action="<?= $model['domain'] . "/admin/tambah_kelas_ke_mata_kuliah" ?>" method="post">
        <h3 class="font-bold text-2xl text-center heading-modal mb-8"></h3>
        <input type="hidden" name="pelajaran_id" value="<?= $model['matakuliah']->id ?>"/>
        <div class="flex items-center input-row my-3">
            <label for="kelas_id" class="w-24">Kelas</label>
            <select name="kelas_id" class="select select-bordered grow" required>
                <option disabled selected value="">pilih kelas</option>
                <option value="1">D4IT A</option>
                <option value="2">D4IT B</option>
                <option value="3">SDT</option>
            </select>
        </div>
        <div class="flex items-center input-row my-3">
            <label for="semester_id" class="w-24">Semester</label>
            <select name="semester_id" class="select select-bordered grow" required>
                <option disabled selected value="">pilih semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>
        <div class="modal-action">
            <label for="my-modal" class="btn btn-accent">Cancel</label>
            <button class="btn">Submit</button>
        </div>
    </form>
</div>