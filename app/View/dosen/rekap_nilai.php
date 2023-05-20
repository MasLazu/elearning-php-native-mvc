<?php require __DIR__ . "/../layout/dosen/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Rekap Nilai</h1>
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
        <form method="get" class="row flex items-center gap-x-3">
            <label class="label w-32">Mata Kuliah</label>
            <select class="select select-bordered" name="id" onchange="this.form.submit()">
                <?php foreach ($model['matakuliah'] as $matakuliah) { ?>
                <option value="<?= $matakuliah->id ?>" <?= $matakuliah->id == $model['matakuliahData']->id ? "selected" : "" ?> ><?= $matakuliah->nama ?></option>
                <?php } ?>
            </select>
        </form>
        <div class="relative overflow-x-auto border sm:rounded-lg mt-8">
            <table class="w-full text-left text-gray-500">
                <thead class="text-[#333c4d] uppercase bg-[#e6e6e6]">
                <tr>
                    <th scope="col" rowspan="2" class="px-4 py-3">Id</th>
                    <th scope="col" rowspan="2" class="px-6 py-3">Nama</th>
                    <th scope="col" rowspan="1" colspan="12" class="px-6 pt-2 text-center">Nilai</th>
                    <th scope="col" rowspan="2" colspan="12" class="px-6 pt-2 text-center"></th>
                </tr>
                <tr class="lowercase">
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center">1</td>
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center">2</td>
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center">3</td>
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center">4</td>
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center">5</td>
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center uppercase">UTS</td>
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center">6</td>
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center">7</td>
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center">8</td>
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center">9</td>
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center">10</td>
                    <td rowspan="1" class="px-6 pb-2 text-sm text-center uppercase">UAS</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($model['pageData'] as $pageData) { ?>
                    <form method="post" action="<?= $model['domain'] . "/dosen/save_rekap_nilai" ?>">
                        <input type="hidden" name="user_id" value="<?= $pageData['user_id'] ?>">
                        <input type="hidden" name="matakuliah_id" value="<?= $_GET['id'] ?>">
                        <input type="hidden" name="nilai_id" value="<?= $pageData['nilai_id'] ?>">
                        <tr class="bg-white border-b">
                            <td class="px-4 py-3"><?= $pageData['user_id'] ?></td>
                            <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                                <a class="font-semibold"><?= $pageData['user_name'] ?></a>
                            </th>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_1" value="<?= $pageData['nilai_1'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_2" value="<?= $pageData['nilai_2'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_3" value="<?= $pageData['nilai_3'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_4" value="<?= $pageData['nilai_4'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_5" value="<?= $pageData['nilai_5'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_uts" value="<?= $pageData['nilai_uts'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_6" value="<?= $pageData['nilai_6'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_7" value="<?= $pageData['nilai_7'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_8" value="<?= $pageData['nilai_8'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_9" value="<?= $pageData['nilai_9'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_10" value="<?= $pageData['nilai_10'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="py-0"><input type="number" min="0" max="100" name="nilai_uas" value="<?= $pageData['nilai_uas'] ?>" class="outline-none w-full h-12 text-center"></td>
                            <td class="px-4">
                                <button class="btn btn-secondary btn-sm"><i class="fa-solid fa-floppy-disk text-white text-xl"></i></button>
                            </td>
                        </tr>
                    </form>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>