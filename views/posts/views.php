<?php
$titlename = "Главная";

require_once "Controller/DatabaseController.php";
require_once "Controller/PostsController.php";
require_once "config/function.php";

if(!isset($_SESSION['auth'])){
    redirect('/');
}

$db = new DatabaseController();
$conn = $db->getConnect();
$posts = new PostsController($conn);
$get_post = $posts->getPost($id);


if (isset($_POST['delete'])) {
    $posts->deletePost($id);
    header('Location: /');
}

?>
<?php include "layout/header.php"; ?>
<?php include "layout/nav.php"; ?>

    <div class="max-w-7xl m-auto mt-5">
        <div class="px-6 pt-4 pb-2 flex items-center justify-between w-full">
            <h1 class="text-xl font-medium">Заголовок поста:<?= $get_post['title']; ?></h1>
            <div class="flex items-center gap-4">
                <a href="/edit/<?= $get_post['id'] ?>" class="bg-orange-500 text-white p-2 px-10 rounded-md hover:bg-orange-600 focus:outline-none focus:bg-orange-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 transition-colors duration-300">Изменить</a>
                <form action="" method="post">
                    <button type="submit" name="delete" class="bg-red-500 text-white p-2 px-10 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-700 focus:ring-2 focus:ring-offset-2 focus:ring-red-900 transition-colors duration-300">Удалить</button>
                </form>
            </div>
        </div>
        <div>
            <img class="w-full max-h-[500px] rounded-xl object-cover" src="/<?= $get_post['image']; ?>" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"><?= $get_post['title']; ?></div>
                <p class="text-gray-700 text-base">
                    <?= $get_post['description']; ?>
                </p>
            </div>
        </div>
    </div>

<?php include "layout/footer.php"; ?>