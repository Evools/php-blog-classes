<?php

function redirect($url)
{
    header("Location: $url");
}

function validateData($username, $email, $password, $confirm) {
    $errors = [];

    if(empty($username)){
        $errors['username'] = "Введите имя пользователя";
    }
    if(empty($email)){
        $errors['email'] = "Введите email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Введите корректный email";
    }
    if(empty($password)){
        $errors['password'] = "Введите пароль";
    } elseif (strlen($password) < 3){
        $errors['password'] = "Пароль должен быть больше 3 символов";
    }elseif ($password != $confirm){
        $errors['confirm'] = "Пароли не совпадают";
    }
    if(empty($confirm)){
        $errors['confirm'] = "Подтвердите пароль";
    } elseif ($password != $confirm){
        $errors['confirm'] = "Пароли не совпадают";
    }

    return $errors;
}