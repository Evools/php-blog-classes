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

if(isset($_POST['add-post'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if (!empty($_FILES['image']['name'])) {
        $uploaddir = 'public/images/';
        $image_url = $uploaddir . basename($_FILES['image']['name']);
        if (copy($_FILES['image']['tmp_name'], $image_url)) {
        } else {
            echo "Произошла ошибка копирования";
        }
    } else {
        $image_url = "./assets/img/no-image-import.jpg";
    }

    $posts->addPost($title, $description, $image_url);
    redirect('/');
}

?>
<?php include "layout/header.php"; ?>
<?php include "layout/nav.php"; ?>

    <div class="max-w-7xl m-auto mt-5">
        <h1 class="text-xl font-medium">Добавить новость на страницу</h1>
        <form action="" method="post" class="mt-5" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Заголовок</label>
                <input name="title" type="text" id="title" class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Описание</label>
                <textarea name="description" id="editor" class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300"></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Изображение</label>
                <input type="file" name="image" id="image" class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" name="add-post" class="bg-black text-white p-2 px-10 rounded-md hover:bg-gray-800 focus:outline-none focus:bg-black focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">Добавить</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.tiny.cloud/1/cdrkywnx15k19w5nx0mss3ocsfzfdmgxzqdtg0x9b4oxiq3b/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#editor',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>
</textarea>


<?php include "layout/footer.php"; ?>