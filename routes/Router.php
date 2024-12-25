<?php

namespace Route;


class Router{
    protected $routes = [];

    protected function addRoute($method, $route, $controller, $action){
        $this->routes[$method][$route] = [
            "controller" => $controller,
            "action" => $action
        ];
    }

    public function get($route, $controller, $action){
        $this->addRoute('GET', $route, $controller, $action);
    }

    public function post($route, $controller, $action){
        $this->addRoute('POST', $route, $controller, $action);
    }

    public function dispatch(){
        $route = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        if(array_key_exists($route, $this->routes[$method] )){
            $controller = $this->routes[$method][$route]['controller'];
            $action = $this->routes[$method][$route]['action'];

            $controller = new $controller;

            
            if($method == 'GET'){
                $data = $_GET;
            }else{
                $data = $_POST;
            }

            if(isset($_FILES['photo']['name'])){
                $controller->$action($data, $_FILES);  
            }elseif($data){
                $controller->$action($data);
            }else{
                $controller->$action();
            }


        }else{
            require_once __DIR__ . "/../views/404.php" ;
        }
    }
}