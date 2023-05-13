<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Users</h1>
        </div>
        <div class="flex-none">
            <h3 class="mr-4 font-semibold"><?= $model['user']->nama ?></h3>
            <a href="<?= $model['domain'] . "/user_profile" ?>" tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $model['user']->link_foto) ?>"/>
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
                <input type="text" name="search" placeholder="Search…"
                       class="input input-bordered rounded-none border-x-0 grow"/>
                <button class="btn btn-square rounded-l-none px-8">
                    <i class="fa-solid fa-magnifying-glass text-xl"></i>
                </button>
            </div>
        </form>
        <div class="rounded-xl border-2">
            <div class="overflow-x-auto w-full">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Member Since</th>
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
                            <td><?php switch ($user->role_id){
                                    case 1:
                                        echo "Admin";
                                        break;
                                    case 2:
                                        echo "Dosen";
                                        break;
                                    case 3:
                                        echo "Mahasiswa";
                                        break;
                                }
                                ?></td>
                            <th>
                                <button class="btn btn-ghost btn-xs"><?= $user->approved_at->format('Y-m-d') ?></button>
                            </th>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>