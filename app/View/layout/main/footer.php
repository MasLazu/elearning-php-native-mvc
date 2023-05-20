<?php if (isset($_GET['message']) && $_GET['message']) { ?>
<div class="absolute hidden right-8 max-w-xs bottom-8 transition duration-200" id="toast">
    <div id="toast-default" class="flex items-center w-full p-4 text-gray-300 bg-[#1f2937] rounded-xl shadow" role="alert">
        <i class="fa-solid fa-comments text-[#3abff8] mx-1 text-xl my-1"></i>
        <div class="ml-3 text-sm font-normal"><?= $_GET['message'] ?></div>
    </div>
</div>
<script>
    const alert = document.getElementById("toast");
    alert.classList.remove('hidden')
     alert.classList.remove('opacity-0')
    setTimeout(() => {
         alert.classList.add("opacity-0")
        setTimeout(() => {
            alert.classList.add('hidden')
        }, 500)
    }, 5000)
</script>
<?php } ?>
<script src=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js "></script>
<script src="https://kit.fontawesome.com/ab9c64cfd8.js" crossorigin="anonymous"></script>
</body>

</html>