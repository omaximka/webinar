<?php

    date_default_timezone_set('Asia/Yekaterinburg');

    $getForm = getParam('data-form');

    switch ($getForm) {
        case 'footer-form':
            $name = getParam('f-name');
            $phone = getParam('f-phone');
            $email = getParam('f-email');
            if (isset($name) && empty($name)) $errors['f-name'] = 'NOT_NAME';
            if (isset ($email) && empty($email)) $errors['f-email'] = 'NOT_EMAIL';
            if (isset ($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['f-email'] = 'NOT_EMAIL_VALIDATE';
            break;
        case 'content-form':
            $name = getParam('c-name');
            $email = getParam('c-email');
            if (isset($name) && empty($name)) $errors['c-name'] = 'NOT_NAME';
            if (isset ($email) && empty($email)) $errors['c-email'] = 'Не указан адрес электронной почты';
            if (isset ($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['c-email'] = 'NOT_EMAIL_VALIDATE';
            break;
        case 'pop-form':
            $name = getParam('p-name');
            $email = getParam('p-email');
            if (isset($name) && empty($name)) $errors['p-name'] = 'NOT_NAME';
            if (isset ($email) && empty($email)) $errors['p-email'] = 'NOT_EMAIL';
            if (isset ($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['p-email'] = 'NOT_EMAIL_VALIDATE';
            break;
    }

    if (!empty($errors)) {
        echo json_encode(array('res'=>'errors', 'errors'=>$errors));
        exit();
    }

    /*

        amoCRM

        iSPRING

        Send Pulse и отправить письмо юзеру с его доступами для iSPRING $a = mail($email_address, $subject, $body, $header);

    */

    $a = true;

echo json_encode(array('res' => $a ? 'ok' : 'errors', array('')));

function getParam($name, $def = ''){return isset($_POST[$name]) ? $_POST[$name] : $def;}

function validatePhone($n){return preg_match('/^\+\d\(\d\d\d\)\d\d\d\-\d\d\-\d\d$/', $n);};