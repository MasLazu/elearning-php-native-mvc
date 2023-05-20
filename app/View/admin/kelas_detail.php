<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold"><?= $model['semester'] . " " . $model['kelas']->nama ?></h1>
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
    <div class="p-10 grid grid-cols-2 gap-x-12">
        <div class="left">
            <h2 class="text-2xl font-semibold mb-6">Anggota : </h2>
            <div class="relative overflow-x-auto border sm:rounded-lg">
                <table class="w-full text-left text-gray-500">
                    <thead class="text-[#333c4d] uppercase bg-[#e6e6e6]">
                        <tr>
                            <th scope="col" class="px-4 py-3">Id</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model['users'] as $user) { ?>
                        <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer" onclick="window.location='<?= $model['domain'] . "/admin/user_detail/?id=" . $user->id ?>';">
                            <th class="p-4"><p><?= $user->id ?></p></th>
                            <td class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                                <div class="flex items-center space-x-3">
                                    <a href="<?= $model['domain'] . "/admin/user_detail/?id=" . $user->id ?>" class="avatar">
                                        <div class="rounded-full w-12 h-12">
                                            <img src="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $user->link_foto) ?>"/>
                                        </div>
                                    </a>
                                    <div>
                                        <a href="<?= $model['domain'] . "/admin/user_detail/?id=" . $user->id ?>" class="font-bold"><?= $user->nama ?></a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-3"><?= $user->email ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="right">
            <h2 class="text-2xl font-semibold mb-6">Mata Kuliah : </h2>
            <div class="relative overflow-x-auto border sm:rounded-lg">
                <table class="w-full text-left text-gray-500">
                    <thead class="text-[#333c4d] uppercase bg-[#e6e6e6]">
                    <tr>
                        <th scope="col" class="px-4 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Dosen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model['matakuliah'] as $matakuliah) { ?>
                        <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer" onclick="window.location='<?= $model['domain'] . "/admin/mata_kuliah_detail/?id=" . $matakuliah['id'] ?>';">
                            <th class="p-4"><p><?= $matakuliah['id'] ?></p></th>
                            <td class="px-6 py-3"><?= $matakuliah['nama'] ?></td>
                            <td class="px-6 py-3"><?= $matakuliah['dosen_name'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
