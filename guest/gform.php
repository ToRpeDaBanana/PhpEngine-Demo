<?php
session_start();
$code = random_str(5);
if(isset($_POST['login_f'])){
    message('Авторизация');
}

else if(isset($_POST['register_f'])){
    email_valid();
    password_valid();
    
    // if( mysqli_num_rows( mysqli_query($CONNECT, "SELECT * FROM 'users' WHERE 'email' = '$_POST[email]'")))
    //     message('Этот E-mail уже зарегистрирован');
    $email = mysqli_real_escape_string($CONNECT, $_POST['email']);
    $query = mysqli_prepare($CONNECT, "SELECT * FROM `users` WHERE `email` = ?");
    mysqli_stmt_bind_param($query, "s", $email);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);

    if(mysqli_num_rows($result) > 0) {
        message('Этот E-mail уже зарегистрирован');
    }

    

    $_SESSION['confirm'] = array(
        'type'=> 'register',
        'email' => $_POST['email'],
        'password'=> $_POST['password'],
        'code' => $code,
    );
    
    go('confirm');
    // mail($_POST['email'],'Регистрация',"Код подтверждения регистрации: <b>$code</b>");
    
}

else if(isset($_POST['recovery_f'])){
    go('recovery');
}

else if(isset($_POST['confirm_f'])){
    if($_SESSION['confirm']['type'] == 'register'){
        if($_SESSION['confirm']['code'] != $_POST['code'])
            message('Неверный код');

        mysqli_query($CONNECT, "INSERT INTO `users` (`email`, `password`) VALUES ('".$_SESSION['confirm']['email']."', '".$_SESSION['confirm']['password']."')");
    
        unset($_SESSION['confirm']);
        go('login');
    }
    else include '404.php';
}

?>