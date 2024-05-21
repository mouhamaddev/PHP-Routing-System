<?php

class Router {
    private $routes = [];
    
    public function get($route, $action) {
        $this->routes['GET'][$route] = $action;
    }

    public function post($route, $action) {
        $this->routes['POST'][$route] = $action;
    }

    public function dispatch($uri, $method) {
        $parsedUrl = parse_url($uri);
        $path = trim($parsedUrl['path'], '/');

        $path = $this->stripPrefix($path);

        error_log("Stripped Path: $path");

        if (isset($this->routes[$method][$path])) {
            $this->executeAction($this->routes[$method][$path]);
        } else {
            throw new Exception('Route not found');
        }
    }

    private function stripPrefix($path) {
        if (substr($path, 0, strlen($this->prefix)) === $this->prefix) {
            return substr($path, strlen($this->prefix));
        }
        return $path;
    }

    private function executeAction($action) {
        list($controller, $method) = explode('@', $action);
        $controllerFile = "controller/$controller.php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $controllerClass = str_replace('/', '\\', $controller);
            $controllerInstance = new $controllerClass();

            if (method_exists($controllerInstance, $method)) {
                $data = $this->getRequestData();
                $response = $controllerInstance->{$method}($data);
                Response::json($response);
            } else {
                throw new Exception('Method not found');
            }
        } else {
            throw new Exception('Controller not found');
        }
    }

    private function getRequestData() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $_GET;
        } else {
            return json_decode(file_get_contents('php://input'), true);
        }
    }
}
