<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = trim($_POST['email']);

    $errors = [];

    if(empty($email)){
        $errors[] = 'Необходимо ввести эл. почту';
    }

    if (empty($errors)) {
        $email = htmlspecialchars($email);
        
        print('<h1>Рассылка оформлена!</h1>');
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}