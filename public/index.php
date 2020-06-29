<?php

define('ROOT', dirname(__DIR__));
require ROOT . '/src/App.php';
App\App::load();



$url = '';

if(isset($_GET['url'])){
    $url =$_GET['url'];
}else{
    $url = 'home';
}

$url = explode('.', $url);
if (!empty($url[1]))
{
    $controller = '\App\Controller\\' . ucfirst($url[0]) . 'Controller';
    $action = $url[1];
    $controller = new $controller();
    $methods = get_class_methods($controller);
    if(in_array($action, $methods))
    {
        $controller->$action();
    }else
    {
        App\App::notFoundControl();
    }
} 
else 
{
    $controller = '\App\Controller\\' . ucfirst($url[0]) . 'Controller';
    $controller = new $controller(); 
}


