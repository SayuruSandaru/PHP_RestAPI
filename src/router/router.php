<?php
class Router
{
    private $routes = [];

    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback)
    {

        $this->routes['POST'][$path] = $callback;
    }

    public function resolve()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $base_path = '/PHP_RestAPI/public';
        $uri = substr($uri, strlen($base_path));
        foreach ($this->routes[$method] as $path => $callback) {
            if ($path === $uri) {
                call_user_func($callback);
                return;
            }
        }
        http_response_code(404);
        echo "404 Not Found";
    }
}
