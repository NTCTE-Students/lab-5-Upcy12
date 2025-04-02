<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    $errors = [];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'не правильный формат электронной почты!';
    }

    if(strlen($message)<10){
        $errors[] = 'Сообщение должно содеожать не менее 10-и символов!';
    }

    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        
        print('<h1>Сообщение отправлено!</h1>');
        print("Задано имя: {$name}<br>");
        print("Задана электронная почта: {$email}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}