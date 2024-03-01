<?php
$titlename = "Главная";
?>
<?php include "layout/header.php"; ?>
<?php include "layout/nav.php"; ?>

<div class="max-w-7xl m-auto mt-5">
    <h1 class="text-xl font-medium">Добро пожаловать на главную страницу</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-5">
        <a href="/" class="max-w-full rounded-xl overflow-hidden border border-gray-200">
            <img class="w-full" src="https://wallpapercave.com/wp/wp13640116.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
            </div>
        </a>
    </div>
</div>

<?php include "layout/footer.php"; ?>