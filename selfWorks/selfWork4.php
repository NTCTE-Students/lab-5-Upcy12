<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = trim($_POST['email']);

    $errors = [];

    // проверка заполнения данными
    if(empty($email)){
        $errors[] = 'Необходимо ввести эл. почту';
    }
    // ВЫВОД ОШИБКИ ИЛИ СООБЩЕНИЯ
    if (empty($errors)) {
        $email = htmlspecialchars($email);
        
        print('<h1>Рассылка оформлена!</h1>');
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}