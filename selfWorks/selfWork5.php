<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = trim($_POST['name']);
    $booking_date = trim($_POST['booking_date']);
    $booking_time = trim($_POST['Booking_time']);

    $errors = [];

    if(intval($booking_date[0] . $booking_date[1] . $booking_date[2] . $booking_date[3]) >= intval(date('Y'))){
        if(intval($booking_date[5] . $booking_date[6]) >= intval(date('m'))){
            if(intval($booking_date[8] . $booking_date[9]) >= intval(date('d'))){
                print($booking_time . '<br>');
                print(time());
            }
            else {
                $errors[] = 'День введен некорректно';
            };
        }
        else{
            $errors[] = 'Месяц введен некорректно'; 
        }
    }else{
        $errors[] = 'Год введен некорректно';
    }

    if (empty($errors)) {
        print('<h1>Рассылка оформлена!</h1>');
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
    print($booking_date . '<br>');
    print(date('Y-m-d'));
}

// print(date('d-M-Y'));