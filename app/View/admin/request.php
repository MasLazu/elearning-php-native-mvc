<?php require __DIR__ . "/../layout/admin/sidebar.php"; ?>
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
        <form action="#">
            <div class="mb-10 flex w-full">
                <select name="from" class="select bg-[#1f2937] rounded-r-none text-white focus:outline-none">
                    <option>nama</option>
                    <option>email</option>
                </select>
                <input type="text" name="search" placeholder="Search…" class="input input-bordered rounded-none border-x-0 grow" />
                <button class="btn btn-square rounded-l-none px-8">
                    <i class="fa-solid fa-magnifying-glass text-xl"></i>
                </button>
            </div>
        </form>
        <div class="grid grid-cols-3 gap-6">
            <?php foreach ($model['users_request'] as $user_request){ ?>
                <form class="request-form border-2 rounded-md p-3 self-start hover:shadow-md duration-100" method="post" action="<?= $model['domain'] ?>/admin/approve_user">
                    <input type="hidden" name="email" class="email-user" value="<?= $user_request->email ?>"/>
                    <h4 class="text-2xl font-semibold nama-user"><?= $user_request->nama ?></h4>
                    <p class="text-xl mb-4"><?= $user_request->email ?></p>
                    <select name="role_id" class="select select-bordered w-full mb-6" required>
                        <option disabled selected value="">pilih role</option>
                        <option value="1">admin</option>
                        <option value="2">dosen</option>
                        <option value="3">mahasiswa</option>
                    </select>
                    <label for="my-modal" class="btn button-modal hidden w-full">Approve</label>
                    <button class="btn w-full button-submit">Approve</button>
                </form>
            <?php } ?>
        </div>
    </div>
</main>
<input type="checkbox" id="my-modal" class="modal-toggle" />
<div class="modal">
    <form class="modal-box" action="<?= $model['domain'] . "/admin/approve_user" ?>" method="post">
        <h3 class="font-bold text-2xl text-center heading-modal mb-8"></h3>
        <input type="hidden" name="role_id" value="3"/>
        <input type="hidden" class="modal-email" name="email" value=""/>
        <div class="flex items-center input-row my-3">
            <label for="jurusan_id" class="w-24">Jurusan</label>
            <select name="jurusan_id" class="select select-bordered grow" required>
                <option disabled selected value="">pilih jurusan</option>
                <option value="1">Teknik Informatika</option>
                <option value="2">Sains Data</option>
            </select>
        </div>
        <div class="flex items-center input-row my-3">
            <label for="kelas_id" class="w-24">Kelas</label>
            <select name="kelas_id" class="select select-bordered grow" required>
                <option disabled selected value="">pilih kelas</option>
                <option value="1">D4IT A</option>
                <option value="2">D4IT B</option>
                <option value="3">SDT</option>
            </select>
        </div>
        <div class="modal-action">
            <label for="my-modal" class="btn btn-accent">Cancel</label>
            <button class="btn">Submit</button>
        </div>
    </form>
</div>
<script>
    const requestForms = document.querySelectorAll('.request-form')

    requestForms.forEach((form) => {
        const selectElement = form.querySelector('select[name="role_id"]')
        const modalButton = form.querySelector('.button-modal')
        const submitButton = form.querySelector('.button-submit')
        const namaUser = form.querySelector('.nama-user').textContent
        const emailUser = form.querySelector('.email-user').value

        selectElement.addEventListener('change', (event)=>{
            if (event.target.value === '3'){
                if (!submitButton.classList.contains('hidden')){
                    submitButton.classList.add('hidden')
                }
                if (modalButton.classList.contains('hidden')){
                    modalButton.classList.remove('hidden')
                }
                document.querySelector('.heading-modal').textContent = namaUser
                document.querySelector('.modal-email').value = emailUser
            } else {
                if (submitButton.classList.contains('hidden')){
                    submitButton.classList.remove('hidden')
                }
                if (!modalButton.classList.contains('hidden')){
                    modalButton.classList.add('hidden')
                }
            }
        })
    })
</script>