<?php 

use models\User;

class UserController
{

    public function actionRegistration()
    {
        $user = new User;

        $errors = [];

        $login = '';
        $pass = '';

        if(isset($_POST['submit'])){
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            $errors = [];

            if(!$user->checkLogin($login)){
                $errors[] = 'Логин уже используеться';
            }
            if(strlen($login) < 4 || strlen($login) > 50){
                $errors[] = 'Недопустимая длинна логина';
            }
            if(strlen($pass) < 4 || strlen($pass) > 50){
                $errors[] = 'Недопустимая длинна пароля';
            }

            if(!count($errors)){
                $user->registration($login, $pass);
            }
        }

        if(isset($_COOKIE['login'])){
            header("Login: http://localhost/schedule/");
        }

        require_once ROOT . '/views/user/sign_up.php';

        return true;

    }

    public function actionAutorisation()
    {

        $user = new User;

        $errors = [];

        $login = '';
        $pass = '';

        if(isset($_POST['submit'])){
            $login = $_POST['login'];
            $pass = $_POST['pass'];

            if(strlen($login) < 4 || strlen($login) > 50){
                $errors[] = 'Недопустимая длинна логина';
            }
            if(strlen($pass) < 4 || strlen($pass) > 50){
                $errors[] = 'Недопустимая длинна пароля';
            }
            if(!count($user->checkAuth($login, $pass))){
                $errors[] = 'Неверный логи или пароль';
            }

            if(!count($errors)){
                setcookie("login", $login, time() + 3600 * 3600, '/');
                setcookie("pass", $pass, time() + 3600 * 3600, '/');
                header('Location: http://localhost/schedule/');
            }
        }

        if(isset($_COOKIE['login'])){
            header("Login: http://localhost/schedule/");
        }

        require_once ROOT . '/views/user/sign_in.php';

        return true;

    } 
    
    public function actionExit()
    {

        if (isset($_COOKIE['login'])) {
            unset($_COOKIE['login']); 
            setcookie('login', null, -1, '/');
        }
        if (isset($_COOKIE['pass'])) {
            unset($_COOKIE['pass']); 
            setcookie('pass', null, -1, '/'); 
        } 

        header("Location: http://localhost/schedule/");

    } 

    public function actionCabinet()
    {

        require_once ROOT . '/views/user/cabinet.php';

        return true;

    }

}