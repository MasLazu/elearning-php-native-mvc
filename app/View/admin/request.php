<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Request</h1>
        </div>
        <div class="flex-none">
            <h3 class="mr-4 font-semibold">Admin</h3>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="p-6 grid grid-cols-3 gap-4">
        <?php foreach ($model['users'] as $user){ ?>
            <form class="border-2 rounded-md p-3 self-start" method="post" action="<?= $model['domain'] ?>/admin/approve_user">
                <input type="hidden" name="email" value="<?= $user->email ?>"/>
                <h4 class="text-2xl font-semibold"><?= $user->nama ?></h4>
                <p class="text-xl mb-4"><?= $user->email ?></p>
                <select name="role_id" class="select select-bordered w-full mb-6" required>
                    <option disabled selected value="">pilih role</option>
                    <option value="1">admin</option>
                    <option value="2">dosen</option>
                    <option value="3">mahasiswa</option>
                </select>
                <button class="btn w-full">Approve</button>
            </form>
        <?php } ?>
    </div>
</main>