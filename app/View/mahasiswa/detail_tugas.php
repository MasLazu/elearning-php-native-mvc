<?php require __DIR__ . "/../layout/mahasiswa/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Beranda</h1>
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
    <div class="p-10">
        <div class="grid grid-cols-3 gap-6">
            <div class="description-tugas col-span-2 border-2 rounded-lg p-4 self-start">
                <h2 class="text-3xl font-semibold mb-4">Tugas Individu - Materi Demokrasi</h2>
                <hr>
                <h4 class="font-semibold mt-3 mb-1">Deskripsi :</h4>
                <p>
                    Mahasiswa menelusuri literatur (buku, jurnal dan sumber lainnya)
                    untuk mencari ceiri-ciri suatu negara menganut Demokrasi sebagai
                    sistem pemerintahan maupun sistem politik Mahasiswa menelusuri literatur
                    (buku, jurnal dan sumber lainnya) untuk mencari fungsi dan peran
                    partai politik dalam suatu negara yang disebut demokratis Tugas
                    Individu ditulis rapi (diketik) dalam bentuk PPT Presentasi disertakan
                    sumber bacaan (daftar pustaka) serta dikumpulkan selambat-lambatnya pada
                    12 Mei 2023 pada pukul 16.00 melalui ETHOL
                </p>
                <h4 class="font-semibold mt-3 mb-1">Batas Waktu :</h4>
                <p>Jumat, 12 Mei 2023 - 16:00</p>
            </div>
            <form class="border-2 rounded-lg p-4 self-start">
                <h2 class="text-2xl font-semibold mb-5">Tugas Anda</h2>
                <label for="catatan" class="font-semibold mt-8">Tugas</label>
                <input type="file" class="file-input file-input-bordered w-full mt-2" />
                <label for="catatan" class="font-semibold">Catatan</label>
                <textarea name="catatan" class="textarea textarea-bordered w-full mt-2 mb-3"></textarea>
                <button class="btn w-full mt-5">Submit</button>
            </form>
        </div>
    </div>
</main>