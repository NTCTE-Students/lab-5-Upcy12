<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = htmlspecialchars(trim($_POST['name']));
    $booking_date = htmlspecialchars(trim($_POST['booking_date']));
    $booking_time = htmlspecialchars($_POST['booking_time']);

    $errors = [];

    // проверка времени и даты
    if(intval($booking_date[0] . $booking_date[1] . $booking_date[2] . $booking_date[3]) < intval(date('Y'))){
        $errors[] = 'Год введен некорректно';
    }
    if(intval($booking_date[5] . $booking_date[6]) < intval(date('m')) && empty($errors)){
        $errors[] = 'Месяц введен некорректно'; 
    }
    if(intval($booking_date[8] . $booking_date[9]) < intval(date('d')) && empty($errors)){
        $errors[] = 'День введен некорректно';
    }
    if(intval($booking_time[0] . $booking_time[1]) < intval(date('H')) && empty($errors)){
        $errors[] = 'Час введен некорректно';
    }
    if(intval($booking_time[3] . $booking_time[4]) < intval(date('i')) && empty($errors)){
        $errors[] = 'Минута введена некорректно';
    }

    // вывод ошибки или сообщения
    if (empty($errors)) {
        print('<h1>Рассылка оформлена!</h1>');
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}
