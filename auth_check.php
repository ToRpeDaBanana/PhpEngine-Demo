<?php

function email_valid(){
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    message('E-mail указан не верно');
}

function password_valid(){
    if ( !preg_match('/^[A-Za-z0-9]{8,30}$/', $_POST['password']) )message('Пароль указан не верно/должен содержать от 8 до 10 символов');
    $_POST['password'] = hash('sha256', $_POST['password']);
}

?>