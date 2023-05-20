<?php require __DIR__ . "/../layout/mahasiswa/sidebar.php"; ?>
<main class="grow h-screen overflow-y-auto">
    <div class="navbar bg-base-100 border-b-2 px-6">
        <div class="flex-1">
            <h1 class="text-2xl font-semibold">Nilai</h1>
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
            <label class="label w-32">Semester</label>
            <select class="select select-bordered" name="semester" onchange="this.form.submit()">
                <option value="1" <?= $_GET['semester'] == "1" ? "selected" : "" ?> >1</option>
                <option value="2" <?= $_GET['semester'] == "2" ? "selected" : "" ?> >2</option>
                <option value="3" <?= $_GET['semester'] == "3" ? "selected" : "" ?> >3</option>
                <option value="4" <?= $_GET['semester'] == "4" ? "selected" : "" ?> >4</option>
                <option value="5" <?= $_GET['semester'] == "5" ? "selected" : "" ?> >5</option>
                <option value="6" <?= $_GET['semester'] == "6" ? "selected" : "" ?> >6</option>
                <option value="7" <?= $_GET['semester'] == "7" ? "selected" : "" ?> >7</option>
                <option value="8" <?= $_GET['semester'] == "8" ? "selected" : "" ?> >8</option>
            </select>
        </form>
        <div class="relative overflow-x-auto border sm:rounded-lg mt-8">
            <table class="w-full text-left text-gray-500">
                <thead class="text-[#333c4d] uppercase bg-[#e6e6e6]">
                <tr>
                    <th scope="col" rowspan="2" class="px-4 py-3">Id</th>
                    <th scope="col" rowspan="2" class="px-6 py-3">Mata Kuliah</th>
                    <th scope="col" rowspan="1" colspan="12" class="px-6 pt-2 text-center">Nilai</th>
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
                <?php foreach ($model['nilai'] as $nilai) { ?>
                    <tr class="bg-white border-b">
                        <td class="px-4 py-3"><?= $nilai['pelajaran_id'] ?></td>
                        <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                            <a class="font-semibold"><?= $nilai['pelajaran_name'] ?></a>
                        </th>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_1" value="<?= $nilai['nilai_1'] ?>" class="outline-none w-full h-12 text-center"></td>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_2" value="<?= $nilai['nilai_2'] ?>" class="outline-none w-full h-12 text-center"></td>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_3" value="<?= $nilai['nilai_3'] ?>" class="outline-none w-full h-12 text-center"></td>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_4" value="<?= $nilai['nilai_4'] ?>" class="outline-none w-full h-12 text-center"></td>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_5" value="<?= $nilai['nilai_5'] ?>" class="outline-none w-full h-12 text-center"></td>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_uts" value="<?= $nilai['nilai_uts'] ?>" class="outline-none w-full h-12 text-center"></td>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_6" value="<?= $nilai['nilai_6'] ?>" class="outline-none w-full h-12 text-center"></td>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_7" value="<?= $nilai['nilai_7'] ?>" class="outline-none w-full h-12 text-center"></td>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_8" value="<?= $nilai['nilai_8'] ?>" class="outline-none w-full h-12 text-center"></td>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_9" value="<?= $nilai['nilai_9'] ?>" class="outline-none w-full h-12 text-center"></td>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_10" value="<?= $nilai['nilai_10'] ?>" class="outline-none w-full h-12 text-center"></td>
                        <td class="py-0"><input type="number" min="0" max="100" name="nilai_uas" value="<?= $nilai['nilai_uas'] ?>" class="outline-none w-full h-12 text-center"></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>