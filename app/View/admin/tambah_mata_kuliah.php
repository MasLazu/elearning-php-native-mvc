<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Tambah Mata Kuliah</h1>
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
    <form action="<?= $model['domain'] . "/admin/tambah_mata_Kuliah"?>" method="post" class="p-10">
        <div class="flex mb-6">
            <label class="label w-48" for="domisili">Nama mata kuliah</label>
            <input type="text" name="nama" class="input input-bordered grow" required/>
        </div>
        <div class="flex my-6">
            <label for="dosen_id" class="label w-48" >Dosen pengajar</label>
            <select name="dosen_id" class="select select-bordered grow" required>
                <option selected disabled value="">Pilih dosen pengajar</option>
                <?php foreach ($model['dosen'] as $dosen) { ?>
                <option value="<?= $dosen->id ?>"><?= $dosen->nama ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="flex my-6">
            <label for="hari" class="label w-48" >Hari</label>
            <select name="hari" class="select select-bordered grow" required>
                <option selected disabled value="">Pilih hari</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
            </select>
        </div>
        <div class="flex my-6">
            <label class="label w-48" for="jam_mulai">Jam mulai</label>
            <input type="text" name="jam_mulai" class="input input-bordered grow" required/>
        </div>
        <div class="flex my-6">
            <label class="label w-48" for="jam_selesai">Jam selesai</label>
            <input type="text" name="jam_selesai" class="input input-bordered grow" required/>
        </div>
        <div class="flex my-6">
            <label class="label w-48" for="ruangan">Ruangan</label>
            <input type="text" name="ruangan" class="input input-bordered grow" required/>
        </div>
        <div class="flex my-6 justify-end">
            <button class="btn px-6">Tambah</button>
        </div>
    </form>
</main>