<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/schedule/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="templates/js/functions.js"></script>
</head>
<body>
    <div>
        <a href="">Главная</a>
        <?php if(!isset($_COOKIE['login'])): ?> 
            <a href="user/autorisation">Войти в аккаунт</a>
            <a href="user/registration">Зарегестрироваться</a>
        <?php endif ?>            
        <?php if(isset($_COOKIE['login'])): ?>
            <a href="user/exit">Выйти</a>
            <a href="admin">Admin Panel</a>
            <a href="user/cabinet">Ваш аккаунт <?php echo $_COOKIE['login'] ?></a>
        <?php endif ?>  
       
    </div>
    <br>