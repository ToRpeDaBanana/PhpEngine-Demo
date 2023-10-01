<?php top('Регистрация') ?>

<h1>Регистрация</h1>

<form>
    <p><input id="email" type="text" placeholder="E-mail"></p>
    <p><input id="password" type="password" placeholder="Пароль"></p>
    <p><button onclick="auth_post('gform', 'register', 'email.password'); return false;">Регистрация</button></p>
</form>
<?php bottom() ?>