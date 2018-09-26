<?php

    date_default_timezone_set('Asia/Yekaterinburg');

    $phone = getParam('phone');

    if (isset($phone) && empty($phone)) $errors['phone'] = 'Не указан контактный телефон';
    if (isset($phone) && !empty($phone) && !validatePhone($phone)) $errors['phone'] = 'Недопустимый формат телефона';

    if (!empty($errors)) {
        echo json_encode(array('res'=>'errors', 'errors'=>$errors));
        exit();
    }

    /*

    В amoCRM добавить телефон юзера по его email

    может ему еще письмо отправить, типо "мы сообщим вам о вебинаре за 5 минут и пр." ?? $a = mail($email_address, $subject, $body, $header);

    */

    $a = true;

echo json_encode(array('res'=>$a?'ok':'errors', array('')));

function getParam($name, $def = ''){return isset($_POST[$name]) ? $_POST[$name] : $def;}

function validatePhone($n){return preg_match('/^\+\d\(\d\d\d\)\d\d\d\-\d\d\-\d\d$/', $n);};