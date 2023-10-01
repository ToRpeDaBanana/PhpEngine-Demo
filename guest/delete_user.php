<?php
// Подключение к базе данных
$CONNECT = mysqli_connect('127.0.0.1', 'root', '', 'php_test_engine');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM `users` WHERE `id` = '$id'";
    mysqli_query($CONNECT, $query);
}
?>
