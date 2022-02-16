<?php 

namespace components;

use components\Db;

class Router
{

    public $controller;

    public function __construct()
    {

        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);

    }

    public function getURI()
    {

        $uri = $_SERVER["REQUEST_URI"];
        $strlen = strlen('/schedule/');
        return substr($uri, $strlen );

    }

    // public function connectController($route, $params)
    // {
    //     if( $route == $this->getURI() ){

    //         require ROOT . '\controllers\\' . $params['controller'] . 'Controller' . '.php';

    //         $controllerName = ucfirst($params['controller']) . 'Controller';
    //         $controllerName = new $controllerName;

    //         $controllerAction = 'action' . ucfirst($params['action']);

    //         $page = $controllerName->$controllerAction();

    //         $this->controller = $params['controller'];

    //     } 
    // }

    public function run()
    {

        //Получить строку запроса
        $uri = $this->getURI();

        //Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            //Сравниваем $uriPattern и $uri
            if(preg_match("~$uriPattern~", $uri)) {
                
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                //Определить какой контроллер и action обрабатывают запрос
                
                $segments = explode('/', $internalRoute);
    
                 
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
                
                $actionName = 'action'.ucfirst(array_shift($segments));
                // echo $actionName;
                //print_r($segments);
                $parameters = $segments;
                //Подключить файл класса контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)){
                    include_once($controllerFile);
                }

                //Создать объект, вызвать метод (т.е action)
                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null){
                    break;
                }

            }
        }
    }
    
    public function stdToArray($obj){
        $reaged = (array)$obj;
        foreach($reaged as $key => &$field){
          if(is_object($field))$field = $this->stdToArray($field);
        }
        return $reaged;
    }
    
}