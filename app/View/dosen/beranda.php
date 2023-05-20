<?php require __DIR__ . "/../layout/dosen/sidebar.php"; ?>
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
        <div class="class-row">
            <div class="flex justify-between items-end">
                <h2 class="text-xl font-semibold">Matakuliah yang diikuti</h2>
                <p>Slidable</p>
            </div>
            <div id="splide" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach ($model['matakuliah'] as $matakuliah) { ?>
                        <li class="splide__slide p-1">
                            <div class="border-2 rounded-md p-3 hover:shadow-md duration-100 cursor-grab active:cursor-grabbing">
                                <h4 class="text-2xl font-semibold mb-2"><?= $matakuliah->nama ?></h4>
                                <p><?= $matakuliah->hari ?>, <?= $matakuliah->jam_mulai ?> - <?= $matakuliah->jam_selesai ?></p>
                                <p><?= $matakuliah->ruangan ?></p>
                                <div class="flex justify-end mt-4">
                                    <a href="<?= $model['domain'] . "/dosen/detail_matakuliah/?id=" . $matakuliah->id ?>" class="btn btn-active btn-sm text-xs">Access Class <i class="fa-solid fa-arrow-right ml-2"></i></a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="splide__arrows splide__arrows--ltr">
                    <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide" aria-controls="splide01-track"></button>
                    <button class="splide__arrow splide__arrow--prev" type="button" aria-label="Next slide" aria-controls="splide01-track"></button>
                </div>
            </div>
        </div>
        <div class="pengumuman-row">
            <div class="flex justify-between mb-2">
                <h2 class="text-xl font-semibold">Pengumuman</h2>
            </div>
            <ul class="space-y-2">
                <?php foreach ($model['pengumuman'] as $pengumuman) { ?>
                    <li class="border-2 rounded-md w-full p-3 hover:shadow-md duration-100">
                        <h3 class="text-xl font-semibold mb-3"><?= $pengumuman->judul ?></h3>
                        <p><?= $pengumuman->isi ?></p>
                    </li>
                <?php } ?>
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