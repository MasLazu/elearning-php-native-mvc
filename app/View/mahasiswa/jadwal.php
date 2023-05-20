<?php require __DIR__ . "/../layout/mahasiswa/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Jadwal</h1>
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
        <form method="get" class="row flex items-center gap-x-3">
            <label class="label w-32">Semester</label>
            <select class="select select-bordered select-sm" name="semester" onchange="this.form.submit()">
                <option value="1" <?= $_GET['semester']=="1" ? "selected" : "" ?> >1</option>
                <option value="2" <?= $_GET['semester']=="2" ? "selected" : "" ?> >2</option>
                <option value="3" <?= $_GET['semester']=="3" ? "selected" : "" ?> >3</option>
                <option value="4" <?= $_GET['semester']=="4" ? "selected" : "" ?> >4</option>
                <option value="5" <?= $_GET['semester']=="5" ? "selected" : "" ?> >5</option>
                <option value="6" <?= $_GET['semester']=="6" ? "selected" : "" ?> >6</option>
                <option value="7" <?= $_GET['semester']=="7" ? "selected" : "" ?> >7</option>
                <option value="8" <?= $_GET['semester']=="8" ? "selected" : "" ?> >8</option>
            </select>
        </form>
        <div class="relative overflow-x-auto border sm:rounded-lg mt-6">
            <table class="w-full text-left text-gray-500">
                <thead class="text-[#333c4d] uppercase bg-[#e6e6e6]">
                    <tr>
                        <th scope="col" class="p-4">Hari</th>
                        <th scope="col" class="px-6 py-3">Mata Kuliah</th>
                        <th scope="col" class="px-6 py-3">Dosen</th>
                        <th scope="col" class="px-6 py-3">Jam</th>
                        <th scope="col" class="px-6 py-3">Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($model['jadwal'] as $jadwal) { ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th class="p-4"><?= $jadwal['hari'] ?></th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <a class="font-semibold"><?= $jadwal['nama'] ?></a>
                        </th>
                        <td class="px-6 py-4"><?= $jadwal['nama_dosen'] ?></td>
                        <td class="px-6 py-4"><?= $jadwal['jam_mulai'] . " - " . $jadwal['jam_selesai'] ?></td>
                        <td class="px-6 py-4"><?= $jadwal['ruangan'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>