<?php top('Вход') ?>



<h1>Вход</h1>

<form>
    <p><input id="email" type="text" placeholder="E-mail"></p>
    <p><input id="password" type="password" placeholder="Пароль"></p>
    <p><button onclick="auth_post('gform', 'login', 'email.password'); return false;">Войти</button>
    <button onclick="auth_post('gform', 'recovery', 'email'); return false;">Восстановить пароль</button></p>
</form>
<?php bottom() ?>