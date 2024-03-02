<?php
session_start();
require_once __DIR__ . '/router.php';

get('/', 'views/pages/index.php');

get('/signin', 'views/auth/signin.php');
post('/signin', 'views/auth/signin.php');

get('/signup', 'views/auth/signup.php');
post('/signup', 'views/auth/signup.php');

get('/add-post', 'views/posts/add-post.php');
post('/add-post', 'views/posts/add-post.php');

get('/views-post/$id', 'views/posts/views.php');
post('/views-post/$id', 'views/posts/views.php');

get('/edit-post/$id', 'views/posts/edit-post.php');
post('/edit-post/$id', 'views/posts/edit-post.php');

post('/logout', function (){
    session_destroy();
    header('Location: /');
});

any('/404', 'views/404.php');
