<?php require __DIR__ . "/../layout/" . $model['role'] . "/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto p-10 grid grid-cols-4">
    <div class="prfile text-slate-600 flex flex-col items-center">
        <div class="avatar mb-4">
            <div class="w-48 rounded-full border-4">
                <img src="<?= str_replace(['C:\xampp\htdocs\coba-mvc\app\Service/../../public', '\\'], $model['domain'], $model['user']->link_foto) ?>"/>
            </div>
        </div>
        <p class="text-2xl font-semibold mb-2 text-center"><?= $model['user']->nama ?></p>
        <p class="text-lg font-semibold"><?= $model['user']->email ?></p>
    </div>
    <form class="pl-10 pb-10 col-span-3 min-h-full flex flex-col" method="post">
        <div class="flex mb-8 mt-4">
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
            <label for="kelamin" class="label w-36">Jenis kelamin</label>
            <select name="jenis_kelamin" class="select select-bordered grow" required>
                <option selected <?= $model['user']->jenis_kelamin ? "" : "selected" ?> disabled value="">Jenis kelamin
                </option>
                <option value="laki-laki" <?= $model['user']->jenis_kelamin == "laki-laki" ? "selected" : "" ?> >
                    Laki-laki
                </option>
                <option value="perempuan" <?= $model['user']->jenis_kelamin == "perempuan" ? "selected" : "" ?> >
                    Perempuan
                </option>
            </select>
        </div>
        <div class="flex mb-12 mt-8">
            <label class="label w-36" for="domisili">Domisili</label>
            <input type="text" name="domisili" class="input input-bordered grow" value="<?= $model['user']->domisili ?>" required/>
        </div>
        <button class="btn w-full">Save</button>
    </form>
</main>