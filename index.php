<?php

ini_set('display_errors',1);
error_reporting(E_ALL); 

use components\Router;
use components\Db;

define('ROOT', dirname(__FILE__));

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class .'.php');
    if(file_exists($path)){
        require $path;
    }
    //include 'classes/' . $class . '.class.php';
});

function dd($value)
{ 
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    die();
}
function d($value)
{ 
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}
function p($value)
{
    echo '<p>'. $value .'</p>';
}

session_start();

$router = new Router;


$router->run();