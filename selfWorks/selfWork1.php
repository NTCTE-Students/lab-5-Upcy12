<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $accept_passw = trim($_POST['accept_password']);

    $errors = [];

    if(empty($name)){
        $errors[] = 'имя обязательно';
    }

    if(empty($password)){
        $errors[] = 'пароль обязателен';
    }

    if($accept_passw != $password){
        $errors[] = 'пароли не совпадают';
    }

    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $password = htmlspecialchars($password);
        
        print('<h1>Успешная регистрация</h1>');
        print("Задано имя: {$name}<br>");
        print("Задан пароль: {$password}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
    
}
