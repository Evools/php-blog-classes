<?php
session_start();
require_once __DIR__ . '/router.php';

get('/', 'views/pages/index.php');

get('/signin', 'views/auth/signin.php');
post('/signin', 'views/auth/signin.php');


get('/signup', 'views/auth/signup.php');
post('/signup', 'views/auth/signup.php');

post('/logout', function (){
    session_destroy();
    header('Location: /');
});

any('/404', 'views/404.php');
