<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo HREF; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script src="templates/js/functions.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark container">
        <a class="navbar-brand" href="">Schedule</a>
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="navbar-toggler" type="button" data-toggle="collapse" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="">Главная</a>
                </li>
                <li class="nav-item">
                    <?php if (!isset($_COOKIE['login'])) : ?>
                        <a class="nav-link" href="user/autorisation">Войти в аккаунт</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user/registration">Зарегестрироваться</a>
                </li>
            <?php endif ?>
            <?php if (isset($_COOKIE['login'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="user/exit">Выйти</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="admin">Admin Panel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user/cabinet">Ваш аккаунт</a>
                </li>
            <?php endif ?>
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>
    <br>

    <!-- MODAL -->
    <div class="modal fade come-from-modal right" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content navbar-dark bg-dark container">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Schedule</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="">Главная</a>
                        </li>
                        <li class="nav-item">
                            <?php if (!isset($_COOKIE['login'])) : ?>
                                <a class="nav-link" href="user/autorisation">Войти в аккаунт</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user/registration">Зарегестрироваться</a>
                        </li>
                    <?php endif ?>
                    <?php if (isset($_COOKIE['login'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="user/exit">Выйти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin">Admin Panel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user/cabinet">Ваш аккаунт</a>
                        </li>
                    <?php endif ?>
                    </ul>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>