<main class="flex h-screen w-screen">
    <div class="flex-1 bg-white flex flex-col items-center justify-center">
        <form class="w-[27rem]" method="post">
            <h1 class="text-5xl font-semibold mb-6">Register</h1>
            <h2 class="text-slate-500 mb-8">Get started your education in IT Pens</h2>
            <?php if(isset($model['error'])){ ?>
                <div class="alert alert-error rounded-lg" id="alert">
                    <div>
                        <i class="fa-solid fa-circle-check mt-1"></i>
                        <span>Error! <?= $model['error'] ?></span>
                    </div>
                </div>
            <?php } ?>
            <label class="label" for="nama">Nama</label>
            <input type="text" name="nama" placeholder="Type here" value="<?= $_POST['nama']?? "" ?>" class="input input-bordered w-full" />
            <label class="label" for="email">Email</label>
            <input type="email" name="email" placeholder="Type here" value="<?= $_POST['email']?? "" ?>" class="input input-bordered w-full" />
            <label class="label" for="password">Password</label>
            <input type="password" name="password" placeholder="Type here" class="input input-bordered w-full" />
            <button class="btn w-full mt-12">Register</button>
            <p class="text-slate-600 mt-4 text-center">Already have an account? <a href="<?= $model['domain'] ?>/auth/login" class="text-[#1f2937] font-semibold">Log in</a></p>
        </form>
    </div>
    <div class="flex-1 bg-[#1f2937] flex items-center justify-center">
        <img src="http://localhost:8080/coba-mvc/public/assets/picture/ilustrasi.svg" class="w-[27rem] h-auto" />
    </div>
</main>
<script>
    setTimeout(() => {
        document.getElementById("alert").classList.add("hidden")
    }, 5000)
</script>