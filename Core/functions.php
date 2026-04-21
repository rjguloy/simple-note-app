<?php

use Core\Response;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}


function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}


function abort($code = Response::NOT_FOUND) {
    http_response_code($code);
    require base_path("controllers/{$code}.php");
    die();
}


function authorize($condition, $status = Response::FORBIDDEN) {
    
    if ( ! $condition) abort($status);

    return true;
}


function base_path($path) {
    return BASE_PATH . $path;
}


function view($path, $attributes = []) {
    extract($attributes);
    require base_path('views/' . $path);
}


function redirect($path) {
    header("Location: {$path}");
    exit();
}


function old($key, $default = '') {
    return Core\Session::get('old')[$key] ?? $default;
}


// function routeToController($uri, $routes) {
//     if (array_key_exists($uri,$routes)) {
//         require_once base_path($routes[$uri]);
//     } else {
//         abort();
//     }
// }

// function router($uri) {
//     $file = '';
//     $controllerFolder = 'controllers';
//     if ($uri == '/') {
//         $file = '/index.php';
//     } else {
//         $file = $uri . '.php';
//     }

//     if ( ! file_exists($controllerFolder . $file)) {
//         abort();
//     }

//     return $controllerFolder . $file;
// }
