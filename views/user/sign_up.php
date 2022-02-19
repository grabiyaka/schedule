<?php require_once ROOT . '/templates/layouts/header.html' ?>
    <title>Sign up</title>
    <h1>Страница регистрации</h1>
    <form method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="pass" placeholder="Пароль">
        <input type="submit" name="submit" value="submit">
    </form>
    <?php foreach($errors as $error): ?>
        <h3><?php echo $error; ?></h3>
    <?php endforeach ?>
</body>
</html>