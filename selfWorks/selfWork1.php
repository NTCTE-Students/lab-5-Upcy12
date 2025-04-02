<?php

// проверка отправки формы
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $accept_passw = trim($_POST['accept_password']);

    $errors = [];
// проверка заполнения данными поле с именем
    if(empty($name)){
        $errors[] = 'имя обязательно';
    }
// проверка заполнения данными поля с парорлем
    if(empty($password)){
        $errors[] = 'пароль обязателен';
    }
// проверка на идентичность введенных паролей
    if($accept_passw != $password){
        $errors[] = 'пароли не совпадают';
    }
// вывод ошибки или солобщения
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
