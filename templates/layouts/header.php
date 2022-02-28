<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/schedule/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    
    <script src="templates/js/functions.js"></script>
</head>
<body>

    

    <div class="container">
        <nav class="navbar navbar-light container">
        <a href=""> <i class="bi bi-house"></i> Главная</a>
        <?php if(!isset($_COOKIE['login'])): ?> 
            <a href="user/autorisation">Войти в аккаунт</a>
            <a href="user/registration">Зарегестрироваться</a>
        <?php endif ?>            
        <?php if(isset($_COOKIE['login'])): ?>
            <a href="user/exit" ><i class="bi bi-box-arrow-right navbar-brand"></i> Выйти</a>
            <a href="admin"><i class="bi bi-pencil-square navbar-brand"></i> Admin Panel</a>
            <a href="user/cabinet"><i class="bi bi-person-circle navbar-brand"></i> Ваш аккаунт <?php echo $_COOKIE['login'] ?></a>
        <?php endif ?>
        </nav>  
    </div>
    <br>