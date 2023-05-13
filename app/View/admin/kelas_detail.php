<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto p-10 grid grid-cols-2 gap-x-12">
    <div class="left">
        <h1 class="text-4xl font-bold mb-12"><?= $model['kelas']->nama ?></h1>
        <h2 class="text-2xl font-semibold mb-8">Anggota : </h2>
        <div class="rounded-xl border-2">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model['users'] as $user) { ?>
                        <tr>
                            <th>
                                <p><?= $user->id ?></p>
                            </th>
                            <td>
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
                            <td><?= $user->email ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="right">
        <h2 class="text-2xl font-semibold mb-8">Mata Kuliah : </h2>
    </div>
</main>
