<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto p-10">
    <form class="px-10" method="post">
        <div class="prfile flex gap-x-16 items-center justify-center text-slate-600">
            <div class="avatar">
                <div class="w-48 rounded-full border-4">
                    <img src="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $model['detail_user']->link_foto) ?>" />
                </div>
            </div>
            <div class="text-2xl font-semibold flex flex-col gap-y-2">
                <div class="row flex">
                    <div class="w-32">User id</div><p>: <?= $model['detail_user']->id ?></p>
                </div>
                <div class="row flex">
                    <div class="w-32">Email</div><p>: <?= $model['detail_user']->email ?></p>
                </div>
            </div>
        </div>
        <div class="flex my-6">
            <label class="label w-36" for="email">Nama</label>
            <input type="text" name="nama" class="input input-bordered grow" value="<?= $model['detail_user']->nama ?>" required/>
        </div>
        <?php if($model['detail_user']->role_id == 3) { ?>
        <div class="flex my-6">
            <label for="jurusan" class="label w-36" >Jurusan</label>
            <select name="jurusan_id" class="select select-bordered grow" required>
                <option selected disabled value="">Jurusan</option>
                <option value="1">Teknik Informatika</option>
                <option value="2">Data Sains</option>
            </select>
        </div>
        <div class="flex my-6">
            <label for="kelas_id" class="label w-36" >Kelas</label>
            <select name="kelas_id" class="select select-bordered grow" required>
                <option selected disabled value="">kelas</option>
                <option value="1">D4IT A</option>
                <option value="2">D4IT B</option>
            </select>
        </div>
        <?php } ?>
        <div class="flex my-6">
            <label class="label w-36" for="tempat_lahir">Tempat lahir</label>
            <input type="text" name="tempat_lahir" class="input input-bordered grow" value="<?= $model['detail_user']->tempat_lahir ?>" required/>
        </div>
        <div class="flex my-6">
            <label class="label w-36" for="tanggal_lahir">Tanggal lahir</label>
            <input type="date" name="tanggal_lahir" class="input input-bordered grow" value="<?= $model['detail_user']->tanggal_lahir ? $model['detail_user']->tanggal_lahir->format('Y-m-d') : "" ?>" required/>
        </div>
        <div class="flex my-6">
            <label for="kelamin" class="label w-36" >Jenis kelamin</label>
            <select name="jenis_kelamin" class="select select-bordered grow" required>
                <option selected <?= $model['detail_user']->jenis_kelamin ? "" : "selected" ?>disabled value="">Jenis kelamin</option>
                <option value="laki-laki" <?= $model['detail_user']->jenis_kelamin == "laki-laki" ? "selected" : "" ?> >Laki-laki</option>
                <option value="perempuan" <?= $model['detail_user']->jenis_kelamin == "perempuan" ? "selected" : "" ?> >Perempuan</option>
            </select>
        </div>
        <div class="flex my-6">
            <label class="label w-36" for="domisili">Domisili</label>
            <input type="text" name="domisili" class="input input-bordered grow" value="<?= $model['detail_user']->domisili ?>" required/>
        </div>
        <button class="btn w-full">Save</button>
    </form>
</main>