<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto p-10 grid grid-cols-4">
    <div class="prfile text-slate-600 flex flex-col items-center">
        <div class="avatar mb-4">
            <div class="w-48 rounded-full border-4">
                <img src="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $model['detail_user']->link_foto) ?>" />
            </div>
        </div>
        <p class="text-2xl font-semibold mb-2 text-center"><?= $model['detail_user']->nama ?></p>
        <p class="text-lg font-semibold"><?= $model['detail_user']->email ?></p>
    </div>
    <form class="pl-10 pb-10 col-span-3 min-h-full flex flex-col" method="post">
        <input type="hidden" name="id" value="<?= $model['detail_user']->id ?>">
        <div class="flex my-6">
            <label class="label w-36" for="email">Nama</label>
            <input type="text" name="nama" class="input input-bordered grow" value="<?= $model['detail_user']->nama ?>" required/>
        </div>
        <?php if($model['detail_user']->role_id == 3) { ?>
        <div class="flex my-4">
            <label for="jurusan" class="label w-36" >Jurusan</label>
            <select name="jurusan_id" class="select select-bordered grow" required>
                <?php foreach ($model['jurusan'] as $jurusan) { ?>
                <option value="<?= $jurusan->id ?>" <?= $model['detail_user']->jurusan_id == $jurusan->id ? "selected" : "" ?> ><?= $jurusan->nama ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="flex my-4">
            <label for="kelas_id" class="label w-36" >Kelas</label>
            <select name="kelas_id" class="select select-bordered grow" required>
                <?php foreach ($model['kelas'] as $kelas) { ?>
                <option value="<?= $kelas->id ?>" <?= $model['detail_user']->kelas_id == $kelas->id ? "selected" : "" ?> ><?= $kelas->nama ?></option>
                <?php } ?>
                <option value="2">D4IT B</option>
            </select>
        </div>
        <?php } ?>
        <div class="flex my-4">
            <label class="label w-36" for="tempat_lahir">Tempat lahir</label>
            <input type="text" name="tempat_lahir" class="input input-bordered grow" value="<?= $model['detail_user']->tempat_lahir ?>" required/>
        </div>
        <div class="flex my-4">
            <label class="label w-36" for="tanggal_lahir">Tanggal lahir</label>
            <input type="date" name="tanggal_lahir" class="input input-bordered grow" value="<?= $model['detail_user']->tanggal_lahir ? $model['detail_user']->tanggal_lahir->format('Y-m-d') : "" ?>" required/>
        </div>
        <div class="flex my-4">
            <label for="kelamin" class="label w-36" >Jenis kelamin</label>
            <select name="jenis_kelamin" class="select select-bordered grow" required>
                <option selected <?= $model['detail_user']->jenis_kelamin ? "" : "selected" ?>disabled value="">Jenis kelamin</option>
                <option value="laki-laki" <?= $model['detail_user']->jenis_kelamin == "laki-laki" ? "selected" : "" ?> >Laki-laki</option>
                <option value="perempuan" <?= $model['detail_user']->jenis_kelamin == "perempuan" ? "selected" : "" ?> >Perempuan</option>
            </select>
        </div>
        <div class="flex my-4">
            <label for="semester_id" class="label w-36" >Semester</label>
            <select name="semester_id" class="select select-bordered grow" required>
                <option value="1" <?= $model['detail_user']->semester_id == 1 ? "selected" : "" ?> >1</option>
                <option value="2" <?= $model['detail_user']->semester_id == 2 ? "selected" : "" ?> >2</option>
                <option value="3" <?= $model['detail_user']->semester_id == 3 ? "selected" : "" ?> >3</option>
                <option value="4" <?= $model['detail_user']->semester_id == 4 ? "selected" : "" ?> >4</option>
                <option value="5" <?= $model['detail_user']->semester_id == 5 ? "selected" : "" ?> >5</option>
                <option value="6" <?= $model['detail_user']->semester_id == 6 ? "selected" : "" ?> >6</option>
                <option value="7" <?= $model['detail_user']->semester_id == 7 ? "selected" : "" ?> >7</option>
                <option value="8" <?= $model['detail_user']->semester_id == 8 ? "selected" : "" ?> >8</option>
            </select>
        </div>
        <div class="flex my-4">
            <label class="label w-36" for="domisili">Domisili</label>
            <input type="text" name="domisili" class="input input-bordered grow" value="<?= $model['detail_user']->domisili ?>" required/>
        </div>
        <div class="grow grid items-end">
            <button class="btn w-full mt-4 mb-10">Save</button>
        </div>
    </form>
</main>