<?php require __DIR__ . "/../layout/mahasiswa/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Beranda</h1>
        </div>
        <div class="flex-none">
            <h3 class="mr-4 font-semibold"><?= $model['username'] ?></h3>
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
    <div class="mb-6 px-6">
        <div class="class-row">
            <div class="flex justify-between items-end">
                <h2 class="my-3 text-xl font-semibold">Class You are Taking</h2>
                <p>Slidable</p>
            </div>
            <div id="splide" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide p-1">
                            <div class="border-2 rounded-md p-3">
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="text-2xl font-semibold">Basis Data</h4>
                                        <p class="text-sm mb-4">Tessy Badriah S.KOM, MT, Ph.D</p>
                                        <p>Kamis, 08:00 - 09:40</p>
                                    </div>
                                    <img class="w-12 h-12 rounded-md" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button class="btn btn-active btn-sm text-xs">Access Class <i class="fa-solid fa-arrow-right ml-2"></i></button>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide p-1">
                            <div class="border-2 rounded-md p-3">
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="text-2xl font-semibold">Pemrograman web</h4>
                                        <p class="text-sm mb-4">Muarifin S.ST., M.T</p>
                                        <p>Kamis, 08:00 - 09:40</p>
                                    </div>
                                    <img class="w-12 h-12 rounded-md" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button class="btn btn-active btn-sm text-xs">Access Class <i class="fa-solid fa-arrow-right ml-2"></i></button>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide p-1">
                            <div class="border-2 rounded-md p-3">
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="text-2xl font-semibold">Algoritma dan Struktur Data</h4>
                                        <p class="text-sm mb-4">Umi Sa'adah S.Kom, M.Kom</p>
                                        <p>Kamis, 08:00 - 13:00</p>
                                    </div>
                                    <img class="w-12 h-12 rounded-md" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button class="btn btn-active btn-sm text-xs">Access Class <i class="fa-solid fa-arrow-right ml-2"></i></button>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide p-1">
                            <div class="border-2 rounded-md p-3">
                                <div class="flex justify-between">
                                    <div>
                                        <h4 class="text-2xl font-semibold">Basis Data</h4>
                                        <p class="text-sm mb-4">Tessy Badriah S.KOM, MT, Ph.D</p>
                                        <p>Kamis, 08:00 - 09:40</p>
                                    </div>
                                    <img class="w-12 h-12 rounded-md" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button class="btn btn-active btn-sm text-xs">Access Class <i class="fa-solid fa-arrow-right ml-2"></i></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="splide__arrows splide__arrows--ltr">
                    <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide" aria-controls="splide01-track"></button>
                    <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Next slide" aria-controls="splide01-track"></button>
                </div>
            </div>
        </div>
        <div class="pengumuman-row">
            <h2 class="my-3 text-xl font-semibold">Pengumuman</h2>
            <ul class="space-y-2">
                <li class="border-2 rounded-md w-full p-3">
                    <h3 class="text-xl font-semibold mb-3">Wisuda Kelulusan PENS 2020</h3>
                    <p>
                        PENS telah melaksanakan wisuda keluluasan jenjang
                        pendidikan D3 pada tanggal 14 April 2023. Mahasiswa
                        jenjang pendidikan D3 tersebut diharapkan dapat menjadi
                        penerus bangsa yang memiliki skill yang berguna di industri
                    </p>
                </li>
                <li class="border-2 rounded-md w-full p-3">
                    <h3 class="text-xl font-semibold mb-3">Daftar Ulang Segera Ditutup</h3>
                    <p>
                        Daftar ulang semester genap tahun ajaran 2023 akan segera
                        ditutup, untuk itu dihimbau mahasiswa dapat segera melunasi
                        pembayaran UKT dan segera melakukan pendaftaran ulang.
                    </p>
                </li>
                <li class="border-2 rounded-md w-full p-3">
                    <h3 class="text-xl font-semibold mb-3">Wisuda Kelulusan PENS 2019</h3>
                    <p>
                        PENS telah melaksanakan wisuda keluluasan jenjang
                        pendidikan D3 pada tanggal 14 April 2022. Mahasiswa
                        jenjang pendidikan D3 tersebut diharapkan dapat menjadi
                        penerus bangsa yang memiliki skill yang berguna di industri
                    </p>
                </li>
            </ul>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#splide', {
            perPage: 3,
            focus: 'center',
            flickMaxPages: 3,
            updateOnMove: true,
            throttle: 300,
            classes: {
                pagination: 'splide__pagination your-class-pagination',
                page: 'splide__pagination__page your-class-page',
                arrow: 'splide__arrow',
                prev: 'splide__arrow--prev',
                next: 'splide__arrow--next',
            }
        }).mount();
    });
</script>