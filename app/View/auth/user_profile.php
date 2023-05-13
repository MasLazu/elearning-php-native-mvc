<?php require __DIR__ . "/../layout/" . $model['role'] . "/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto p-10">
    <form class="px-10" method="post">
        <div class="prfile flex gap-x-16 items-center justify-center text-slate-600">
            <div class="avatar">
                <div class="w-48 rounded-full border-4">
                    <img src="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $model['user']->link_foto) ?>" />
                </div>
            </div>
            <div class="text-2xl font-semibold flex flex-col gap-y-2">
                <div class="row flex">
                    <div class="w-32">User id</div><p>: <?= $model['user']->id ?></p>
                </div>
                <div class="row flex">
                    <div class="w-32">Email</div><p>: <?= $model['user']->email ?></p>
                </div>
                <div class="row flex">
                    <div class="w-32">Jurusan</div><p>: Jurusan Dummy</p>
                </div>
                <div class="row flex">
                    <div class="w-32">kelas</div><p>: Kelas Dummy</p>
                </div>
            </div>
        </div>
        <div class="flex mt-10 mb-8">
            <label class="label w-36" for="email">Nama</label>
            <input type="text" name="nama" class="input input-bordered grow" value="<?= $model['user']->nama ?>" required/>
        </div>
        <div class="flex my-8">
            <label class="label w-36" for="tempat_lahir">Tempat lahir</label>
            <input type="text" name="tempat_lahir" class="input input-bordered grow" value="<?= $model['user']->tempat_lahir ?>" required/>
        </div>
        <div class="flex my-8">
            <label class="label w-36" for="tanggal_lahir">Tanggal lahir</label>
            <input type="date" name="tanggal_lahir" class="input input-bordered grow" value="<?= $model['user']->tanggal_lahir ? $model['user']->tanggal_lahir->format('Y-m-d') : "" ?>" required/>
        </div>
        <div class="flex my-8">
            <label for="kelamin" class="label w-36" >Jenis kelamin</label>
            <select name="jenis_kelamin" class="select select-bordered grow" required>
                <option selected <?= $model['user']->jenis_kelamin ? "" : "selected" ?>disabled value="">Jenis kelamin</option>
                <option value="laki-laki" <?= $model['user']->jenis_kelamin == "laki-laki" ? "selected" : "" ?> >Laki-laki</option>
                <option value="perempuan" <?= $model['user']->jenis_kelamin == "perempuan" ? "selected" : "" ?> >Perempuan</option>
            </select>
        </div>
        <div class="flex mb-12 mt-8">
            <label class="label w-36" for="domisili">Domisili</label>
            <input type="text" name="domisili" class="input input-bordered grow" value="<?= $model['user']->domisili ?>" required/>
        </div>
        <button class="btn w-full">Save</button>
    </form>
</main>