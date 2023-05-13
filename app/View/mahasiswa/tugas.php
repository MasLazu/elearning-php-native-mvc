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
        <div class="row flex items-center gap-x-3">
            <label class="label mr-2 text-lg">Mata Kuliah</label>
            <select class="select select-bordered">
                <option>Semua</option>
                <option>Kewarganegaraan</option>
                <option>Sistem Operasi</option>
                <option>Basis Data</option>
                <option>pemrograman Web</option>
            </select>
        </div>
        <div class="row flex grid grid-cols-2 gap-6 mt-6">
            <div class="card-tugas border-2 rounded-xl p-6 hover:shadow-md">
                <h3 class="text-xl font-semibold mb-3">TUGAS INDIVIDU - MATERI DMEOKRASI</h3>
                <p>
                    Mahasiswa menelusuri literatur (buku, jurnal dan sumber lainnya)
                    untuk mencari ceiri-ciri suatu negara menganut Demokrasi sebagai
                    sistem pemerintahan maupun sistem politik Mahasiswa menelusuri
                    literatur (buku, jurnal dan sumber lainnya)
                </p>
                <p class="mt-2">Deadline : Jumat, 12 Mei 2023 - 16:00</p>
                <div class="flex justify-between mt-4">
                    <div class="status text-red-600 flex items-center">
                        <i class="fa-solid fa-circle-xmark mr-2"></i>
                        belum mengumpulkan
                    </div>
                    <a href="<?= $domain ?>detail_tugas" class="btn btn-sm">Detail <i class="fa-solid fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            <div class="card-tugas border-2 rounded-xl p-6 hover:shadow-md">
                <h3 class="text-xl font-semibold mb-3">TUGAS INDIVIDU - MATERI DMEOKRASI</h3>
                <p>
                    Mahasiswa menelusuri literatur (buku, jurnal dan sumber lainnya)
                    untuk mencari ceiri-ciri suatu negara menganut Demokrasi sebagai
                    sistem pemerintahan maupun sistem politik Mahasiswa menelusuri
                    literatur (buku, jurnal dan sumber lainnya)
                </p>
                <p class="mt-2">Deadline : Jumat, 12 Mei 2023 - 16:00</p>
                <div class="flex justify-between mt-4">
                    <div class="status text-red-600 flex items-center">
                        <i class="fa-solid fa-circle-xmark mr-2"></i>
                        belum mengumpulkan
                    </div>
                    <a href="<?= $domain ?>detail_tugas" class="btn btn-sm">Detail <i class="fa-solid fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            <div class="card-tugas border-2 rounded-xl p-6 hover:shadow-md">
                <h3 class="text-xl font-semibold mb-3">TUGAS INDIVIDU - MATERI DMEOKRASI</h3>
                <p>
                    Mahasiswa menelusuri literatur (buku, jurnal dan sumber lainnya)
                    untuk mencari ceiri-ciri suatu negara menganut Demokrasi sebagai
                    sistem pemerintahan maupun sistem politik Mahasiswa menelusuri
                    literatur (buku, jurnal dan sumber lainnya)
                </p>
                <p class="mt-2">Deadline : Jumat, 12 Mei 2023 - 16:00</p>
                <div class="flex justify-between mt-4">
                    <div class="status text-red-600 flex items-center">
                        <i class="fa-solid fa-circle-xmark mr-2"></i>
                        belum mengumpulkan
                    </div>
                    <a href="<?= $domain ?>detail_tugas" class="btn btn-sm">Detail <i class="fa-solid fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            <div class="card-tugas border-2 rounded-xl p-6 hover:shadow-md">
                <h3 class="text-xl font-semibold mb-3">TUGAS INDIVIDU - MATERI DMEOKRASI</h3>
                <p>
                    Mahasiswa menelusuri literatur (buku, jurnal dan sumber lainnya)
                    untuk mencari ceiri-ciri suatu negara menganut Demokrasi sebagai
                    sistem pemerintahan maupun sistem politik Mahasiswa menelusuri
                    literatur (buku, jurnal dan sumber lainnya)
                </p>
                <p class="mt-2">Deadline : Jumat, 12 Mei 2023 - 16:00</p>
                <div class="flex justify-between mt-4">
                    <div class="status text-red-600 flex items-center">
                        <i class="fa-solid fa-circle-xmark mr-2"></i>
                        belum mengumpulkan
                    </div>
                    <a href="<?= $domain ?>detail_tugas" class="btn btn-sm">Detail <i class="fa-solid fa-arrow-right ml-1"></i></a>
                </div>
            </div>
            <div class="card-tugas border-2 rounded-xl p-6 hover:shadow-md">
                <h3 class="text-xl font-semibold mb-3">TUGAS INDIVIDU - MATERI DMEOKRASI</h3>
                <p>
                    Mahasiswa menelusuri literatur (buku, jurnal dan sumber lainnya)
                    untuk mencari ceiri-ciri suatu negara menganut Demokrasi sebagai
                    sistem pemerintahan maupun sistem politik Mahasiswa menelusuri
                    literatur (buku, jurnal dan sumber lainnya)
                </p>
                <p class="mt-2">Deadline : Jumat, 12 Mei 2023 - 16:00</p>
                <div class="flex justify-between mt-4">
                    <div class="status text-red-600 flex items-center">
                        <i class="fa-solid fa-circle-xmark mr-2"></i>
                        belum mengumpulkan
                    </div>
                    <a href="<?= $domain ?>detail_tugas" class="btn btn-sm">Detail <i class="fa-solid fa-arrow-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</main>