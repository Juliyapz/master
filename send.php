<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$name2 = $_POST['name2'];
$phone2 = $_POST['phone2'];
$message2 = $_POST['message2'];


if (!empty($name2 == "") && !empty($phone2 == "") && !empty($message2 == "")) {
// Формирование самого письма
    $title = "Новое обращение";
    $body = "
    <h2>Новое обращение</h2>
    <b>Имя:</b> $name<br>
    <b>Телефон:</b> $phone<br>
    <b>Сообщение:</b><br>$message
    ";

    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        $mail->isSMTP();   
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth   = true;
        //$mail->SMTPDebug = 2;
        $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

        // Настройки вашей почты
        $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
        $mail->Username   = 'juliya.ser.kovtun@gmail.com'; // Логин на почте
        $mail->Password   = 'wv777k1yu5s93'; // Пароль на почте
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('juliya.ser.kovtun@gmail.com', 'Юлия Кремлева'); // Адрес самой почты и имя отправителя

        // Получатель письма
        $mail->addAddress('kremleva_yuliya@mail.ru');  



    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;  


    // Проверяем отравленность сообщения
    if ($mail->send()) {$result = "success";} 
    else {$result = "error";}

    } catch (Exception $e) {
        $result = "error";
        $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
    }

    // Отображение результата
    echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);
  } else{
    // Формирование самого письма
    $title2 = "Новое обращение";
    $body2 = "
    <h2>Новое обращение</h2>
    <b>Имя:</b> $name2<br>
    <b>Телефон:</b> $phone2<br>
    <b>Сообщение:</b><br>$message2
    ";

    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        $mail->isSMTP();   
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth   = true;
        //$mail->SMTPDebug = 2;
        $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

        // Настройки вашей почты
        $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
        $mail->Username   = 'juliya.ser.kovtun@gmail.com'; // Логин на почте
        $mail->Password   = 'wv777k1yu5s93'; // Пароль на почте
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('juliya.ser.kovtun@gmail.com', 'Юлия Кремлева'); // Адрес самой почты и имя отправителя

        // Получатель письма
        $mail->addAddress('kremleva_yuliya@mail.ru');  



    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title2;
    $mail->Body = $body2;  


    // Проверяем отравленность сообщения
    if ($mail->send()) {$result = "success";} 
    else {$result = "error";}

    } catch (Exception $e) {
        $result = "error";
        $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
    }

    // Отображение результата
    echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);
  }