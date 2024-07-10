<?php

use database\Response;

function dd($value){
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die();

    }

    function urlIs($value){
        return $_SERVER["REQUEST_URI"] === $value;
    }

    function abort($code = 404){
        http_response_code($code);
        view("status_codes/{$code}.php");
        die();
    }

    function authorize($condition){
        if(!$condition){
            abort(Response::FORBIDDEN);
        }
    }

    function base_path($path)
    {
        return BASE_PATH . $path;
    }

    function view($path, $attributes = [])
    {
        extract($attributes);

        require base_path('views/' . $path);
    }

    function viewAndExit($path, $attributes = [])
    {
        extract($attributes);

        require base_path('views/' . $path);

        exit();
    }

    function redirect($path){
        header("location: {$path}");
        exit();
    }

    function old($key, $default = ''){
        return \core\Session::get('old')[$key] ?? $default ;
    }