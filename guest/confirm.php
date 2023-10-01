<?php 
if(!$_SESSION['confirm']['code']) include '404.php';



top('Подтверждение') ?>

<h1>Подтверждение</h1>

<form>
    <p><input id="code" type="text" placeholder="Код"></p>
    <p><button onclick="auth_post('gform', 'confirm', 'code')">Подтвердить</button></p>
</form>
<?php 

    echo $_SESSION['confirm']['code'];
?>

<?php bottom() ?>