<?php

namespace models;

use components\Db;
use models\Site;

class User
{

    public function __construct()
    {
        $db = new Db;
        $this->db = $db->getConnection();

        $this->site = new Site;
    }

    public function checkUser()
    {

        if(!isset($_COOKIE['login'])){
            header("location: http://localhost/schedule/user/autorisation");
        } 

    }

    public function checkLogin($login)
    {
        $users = $this->site->selectAllFrom('users');

        foreach($users as $user){
            if($user['login'] == $login){
                return false;
            }
        } return true;

    }

    public function registration($login, $pass)
    {

        $pass = md5($pass.'1vjk43kvb565k6v');

        $this->db->q("INSERT INTO users (`login`, `password`) VALUES('$login', '$pass')");

    }

    public function checkAuth($login, $pass)
    {

        $pass = md5($pass.'1vjk43kvb565k6v');

        $user = [];

        $user = json_decode($this->db->q("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass' ")->json());

        return $user;

    }

}