<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    $errors = [];

    if(strlen($name) < 4){
        $errors[] = 'Слишком маленькое имя';
    }else if (!preg_match("/^[a-zA-Z ]*$/", $name)){
        $errors[] = "имя должно состоять только из латиницы";
    }

    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $password = htmlspecialchars($password);
        
        print('<h1>Сообщение отправлено!</h1>');
        print("Задано имя: {$name}<br>");
        print("Задана электронная почта: {$password}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}
