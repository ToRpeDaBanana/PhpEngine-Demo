<?php
require_once 'layout.php';
require_once 'auth_check.php';

if ($_SERVER['REQUEST_URI'] == '/'){
    $page = 'home'; 
    // header( 'Location: login' );
}
else {
    $page  = substr($_SERVER['REQUEST_URI'], 1);
    if ( !preg_match('/^[A-Za-z0-9]{3,15}$/', $page) ) include '404.php';
}


$CONNECT = mysqli_connect('127.0.0.1', 'root', '', 'php_test_engine');

if (!$CONNECT) exit('MySQL error');

session_start();

if ( file_exists('all/' .$page. '.php') ) include 'all/' .$page. '.php';

// else if ($_SESSION['ulogin'] == 1 and file_exists('auth/' .$page. '.php') ) include 'auth/' .$page. '.php';

// else if ( $_SESSION['ulogin'] != 1 and file_exists('guest/' .$page. '.php') ) include 'guest/' .$page. '.php';
else if (file_exists('auth/' .$page. '.php') ) include 'auth/' .$page. '.php';

else if (file_exists('guest/' .$page. '.php') ) include 'guest/' .$page. '.php';

else include '404.php';

function random_str($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>