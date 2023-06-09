<main class="flex h-screen w-screen">
    <div class="flex-1 bg-white flex flex-col items-center justify-center">
        <form class="w-[28rem]" method="post">
            <h1 class="text-5xl font-semibold mb-6">Log in</h1>
            <h2 class="text-slate-500 mb-8">Welcome back! Please enter your credentials</h2>
            <?php if(isset($model['error'])){ ?>
                <div class="alert alert-error rounded-lg opacity-0 hidden transition-all duration-500" id="alert">
                    <div>
                        <i class="fa-solid fa-circle-check mt-1"></i>
                        <span><?= $model['error'] ?></span>
                    </div>
                </div>
            <?php } ?>
            <?php if(isset($_GET['message'])){ ?>
                <div class="alert alert-info rounded-lg opacity-0 opacity-0 hidden transition-all duration-500" id="alert">
                    <div>
                        <i class="fa-solid fa-circle-check mt-1"></i>
                        <span><?= $_GET['message'] ?></span>
                    </div>
                </div>
            <?php } ?>
            <label class="label" for="email">Email</label>
            <input type="email" name="email" placeholder="Type here" class="input input-bordered w-full" value="<?= $_POST['email'] ?? "" ?>" required/>
            <label class="label" for="email">Password</label>
            <input type="password" name="password" placeholder="Type here" class="input input-bordered w-full" required/>
            <button class="btn w-full mt-12">Login</button>
            <p class="text-slate-600 mt-4 text-center">Dont have an account? <a href="<?= $model['domain'] ?>/auth/register" class="text-[#1f2937] font-semibold">Register</a></p>
        </form>
    </div>
    <div class="flex-1 bg-[#1f2937] flex items-center justify-center">
        <img src="http://localhost:8080/coba-mvc/public/assets/picture/ilustrasi.svg" class="w-[27rem] h-auto" />
    </div>
</main>
<script>
    <?php if(isset($_GET['message']) || isset($model['error'])){ ?>
    const alert = document.getElementById("alert");
    alert.classList.remove('hidden')
    alert.classList.remove('opacity-0')
    setTimeout(() => {
        alert.classList.add("opacity-0")
        setTimeout(() => {
            alert.classList.add('hidden')
        }, 500)
    }, 5000)
    <?php } ?>
</script>