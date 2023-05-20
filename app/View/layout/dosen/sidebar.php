<aside id="default-sidebar" class="z-40 flex-none w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar" style="box-shadow: rgba(149, 157, 165, 0.9) 0px 0px 8px;">
    <div class="px-3 h-full py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-center my-8">
                <img src="https://kemahasiswaan.pens.ac.id/wp-content/uploads/2018/10/about_himit_2017_08_24-300x262.png" class="w-14 h-auto" />
                <h2 class="text-white text-2xl ml-3">IT Pens</h2>
            </div>
            <ul class="font-medium">
                <li class="space-y-2">
                    <a href="<?= $model['domain'] ?>/dosen/beranda" class="flex items-center p-2.5 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="w-8 flex justify-center">
                            <i class="fa-solid fa-house fa-chart-pie text-[#9ca3af] mx-1 text-xl"></i>
                        </div>
                        <span class="ml-3">Beranda</span>
                    </a>
                    <a href="<?= $model['domain'] ?>/dosen/jadwal" class="flex items-center p-2.5 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="w-8 flex justify-center">
                            <i class="fa-solid fa-calendar text-[#9ca3af] mx-1 text-xl"></i>
                        </div>
                        <span class="ml-3">Jadwal</span>
                    </a>
                    <a href="<?= $model['domain'] ?>/dosen/rekap_nilai" class="flex items-center p-2.5 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <div class="w-8 flex justify-center">
                            <i class="fa-solid fa-marker text-[#9ca3af] mx-1 text-xl"></i>
                        </div>
                        <span class="ml-3">Rekap nilai</span>
                    </a>
                </li>
            </ul>
        </div>
        <a href="<?= $model['domain'] ?>/logout" class="flex items-center p-2.5 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
            <i class="fa-solid fa-right-from-bracket text-[#9ca3af] mx-1 text-xl"></i>
            <span class="flex-1 ml-3 whitespace-nowrap">Log out</span></a>
        </a>
    </div>
</aside>