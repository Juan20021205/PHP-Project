<?php 
//FRONT CONTROLLER
require_once "models/database.php";
session_start();
/*if(isset($_SESSION['user']) || (isset($_POST['email']) && isset($_POST['password']))){
    if(!isset($_GET['c'])){
        
        require_once 'controllers/home.controller.php';
        $controller = new HomeController();
        call_user_func(array($controller,"index"));
    }else {
        $controller = $_GET['c'];
        require_once "controllers/$controller.controller.php";
        $controller = ucwords($controller)."Controller";
        $controller = new $controller;
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';
        call_user_func(array($controller,$action));
    }
}else {
    require_once 'controllers/user.controller.php';
    $controller = new UserController();
    call_user_func(array($controller,"login"));
}*/
if (!isset($_GET['c'])) {
    require_once 'controllers/home.controller.php';
    $controller = new HomeController();
    call_user_func(array($controller,"index"));
}else{
    $controller= $_GET['c'];
    require_once "controllers/$controller.controller.php";
    $controller = ucwords($controller)."Controller";
    $controller = new $controller;
    $action = isset($_GET['a'])? $_GET['a']:'index';
    call_user_func(array($controller,$action));
}

