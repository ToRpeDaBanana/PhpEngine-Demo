<?php top('Восстановление пароля') ?>

<h1>Восстановление пароля</h1>

<form>
    <p><input id="email" type="text" placeholder="E-mail"></p>
    <p><button onclick="auth_post('gform', 'recovery', 'email'); return false;">Восстановить</button></p>
</form>

<?php bottom() ?>