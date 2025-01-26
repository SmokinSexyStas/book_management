<?php

namespace core;

class Router {
    private $routes = [];

    public function add($route, $action) {
        $this->routes[$route] = $action;
    }

    public function dispatch($uri) {
        $uri = parse_url($uri, PHP_URL_PATH);
        if (array_key_exists($uri, $this->routes)) {
            list($controller, $action) = explode('@', $this->routes[$uri]);
            $this->callAction($controller, $action);
        } else {
            http_response_code(404);
            echo '<h3>Page not found!</h3>';
        }
    }

    private function callAction($controller, $action) {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/app/controllers/$controller.php";
        $controllerObj = new $controller();
        if (method_exists($controllerObj, $action)) {
            $controllerObj->$action();
        } else {
            throw new Exception("Method $action not found in controller $controller");
        }
    }
}