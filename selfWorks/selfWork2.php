<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    $errors = [];

    // проверка формата введенного поля
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = 'не правильный формат электронной почты!';
    }

    // проверка ввода нужного количества символов
    if(strlen($message)<10){
        $errors[] = 'Сообщение должно содеожать не менее 10-и символов!';
    }
// вывод сообщения или ошибки
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