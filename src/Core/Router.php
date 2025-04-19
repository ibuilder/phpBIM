<?php

class Router {
    private $routes = [];

    public function addRoute($method, $path, $controller, $action) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function resolve($requestMethod, $requestUri) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestUri) {
                return [
                    'controller' => $route['controller'],
                    'action' => $route['action']
                ];
            }
        }

        return null; // No route found
    }
}