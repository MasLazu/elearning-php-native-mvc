<main class="h-screen w-screen overscroll-y-auto">
    <form class="px-10 py-16 max-w-5xl mx-auto" enctype="multipart/form-data" method="post">
            <div class="brand flex items-center">
                <img src="https://kemahasiswaan.pens.ac.id/wp-content/uploads/2018/10/about_himit_2017_08_24-300x262.png" class="w-12 h-auto" />
                <h3 class="text-2xl font-semibold">IT Pens</h3>
            </div>
            <h1 class="text-6xl font-semibold text-slate-800 mt-6 mb-8">Lengkapi Data</h1>
            <h2 class="text-lg text-slate-600 mb-12">Lengkapi data untuk melanjutkan menjadi anggota IT PENS</h2>
            <div class="flex my-8">
                <label class="label w-36" for="email">Nama</label>
                <input type="text" name="nama" class="input input-bordered grow" value="<?= $model['user']->nama ?>" required/>
            </div>
            <div class="flex my-12">
                <label class="label w-36" for="tempat_lahir">Tempat lahir</label>
                <input type="text" name="tempat_lahir" class="input input-bordered grow" value="<?= $model['user']->tempat_lahir ?>" required/>
            </div>
            <div class="flex my-12">
                <label class="label w-36" for="tanggal_lahir">Tanggal lahir</label>
                <input type="date" name="tanggal_lahir" class="input input-bordered grow" value="<?php $model['user']->tanggal_lahir ? $model['user']->tanggal_lahir->format('Y-m-d') : "" ?>" required/>
            </div>
            <div class="flex my-12">
                <label for="kelamin" class="label w-36" >Jenis kelamin</label>
                <select name="jenis_kelamin" class="select select-bordered grow" required>
                    <option selected disabled value="">Jenis kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="flex mb-12 mt-10">
                <label class="label w-36" for="domisili">Domisili</label>
                <input type="text" name="domisili" class="input input-bordered grow" value="<?= $model['user']->domisili ?>" required/>
            </div>
            <div class="flex my-12">
                <label class="label w-36" for="domisili">Pass foto</label>
                <input type="file" name="foto" accept="image/png, image/jpeg" class="file-input file-input-bordered grow" required/>
            </div>
            <button class="btn w-full">Submit</button>
    </form>
</main>