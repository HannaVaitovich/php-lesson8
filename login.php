<?php
require_once 'core/core.php';

$errors = [];
 //

if (isPost()) {
    if (login(getParam('login'), getParam('password')) || guest(getParam('username'))) {
        redirect('list');
    } else {
        $errors[] = "Неверный логин и/или пароль.";
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>PHP: Lesson 8</title>
</head>
<body>
<style type="text/css">
    .login {
        box-sizing: border-box;
        margin: 0 auto;
        width: 500px;
        padding: 10px 20px;
        border: 2px solid #0923DF;
        font-size: 20px;
        text-align: center;
        color: #0923DF;
    }

    h3 {
        font-size: 20px;
        text-align: center;
        color: #0923DF;
    }
</style>

<h3>Авторизуйтесь или войдите как гость, введя только имя:</h3>

<div class="login">
<?php if (!empty($errors)) { ?>
<ul>
    <?php foreach ($errors as $error) { ?>
    <li><?= $error ?></li>
    <?php } ?>
</ul>
<?php } ?>
<form method="POST" action="">
    <label>Ваш логин: <input type="text" name="login" placeholder="Введите логин"></label>
    <br>
    <label>Пароль: <input type="password" name="password" placeholder="Введите пароль"></label>
    <hr>
    <label>Войти, как гость: <input type="text" name="username" placeholder="Введите ваше имя"></label>
    <br>
    <input type="submit" name="submit" value="Войти">
</form>
</div>
</body>
</html>