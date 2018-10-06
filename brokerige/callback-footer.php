<?php

    /*date_default_timezone_set('Asia/Yekaterinburg');*/
    date_default_timezone_set('Europe/Moscow');

    $getForm = getParam('data-form');
    $phone = 'not_phone';

    switch ($getForm) {
        case 'footer-form':
            $name = getParam('f-name');
            $phone = getParam('f-phone');
            $email = getParam('f-email');
            $event_form = 'Форма регистрации внизу сайта';
            if (isset($name) && empty($name)) $errors['f-name'] = 'NOT_NAME';
            if (isset ($email) && empty($email)) $errors['f-email'] = 'NOT_EMAIL';
            if (isset ($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['f-email'] = 'NOT_EMAIL_VALIDATE';
            break;
        case 'content-form':
            $name = getParam('c-name');
            $email = getParam('c-email');
            $event_form = 'Форма "Задать свой вопрос в режиме онлайн"';
            if (isset($name) && empty($name)) $errors['c-name'] = 'NOT_NAME';
            if (isset ($email) && empty($email)) $errors['c-email'] = 'Не указан адрес электронной почты';
            if (isset ($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['c-email'] = 'NOT_EMAIL_VALIDATE';
            break;
        case 'pop-form':
            $name = getParam('p-name');
            $email = getParam('p-email');
            $event_form = 'Поп-ап форма в начале сайта';
            if (isset($name) && empty($name)) $errors['p-name'] = 'NOT_NAME';
            if (isset ($email) && empty($email)) $errors['p-email'] = 'NOT_EMAIL';
            if (isset ($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['p-email'] = 'NOT_EMAIL_VALIDATE';
            break;
    }

    if (!empty($errors)) {
        echo json_encode(array('res'=>'errors', 'errors'=>$errors));
        exit();
    }

    $body = date('d.m.Y')." | ".date('H:i')."<br><br>";

    $body .= "На сайте ".$_SERVER['SERVER_NAME']." была заполнена форма регистрации."."<br><br>";

    $body .= "Событие формы: ".$event_form."<br><br>";

    $body .= "ФИО: ".$name."<br><br>";

    $body .= "Телефон: ".$phone."<br><br>";

    $body .= "Email: ".$email."<br><br>";

    $header = "Content-type: text/html; charset=\"utf-8\"\r\n";
    $header .= "From: automail@rbs-24.ru\r\n";

    $email_address = "sale@rbs-24.ru";

    $subject = $_SERVER['SERVER_NAME'] . " - Регистрация пользователя";

    $a = mail($email_address, $subject, $body, $header);

echo json_encode(array('res' => $a ? 'ok' : 'errors', array('')));

function getParam($name, $def = ''){return isset($_POST[$name]) ? $_POST[$name] : $def;}

function validatePhone($n){return preg_match('/^\+\d\(\d\d\d\)\d\d\d\-\d\d\-\d\d$/', $n);};