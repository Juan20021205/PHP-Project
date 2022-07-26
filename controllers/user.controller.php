<?php

require_once "models/user.php";
require_once "models/roles.php";

class UserController
{
    private $model;

    function __CONSTRUCT()
    {
        $this->model = new User();
    }

    function index()
    {
        $roles = new roles();
        $user = new User();
        $users = $user->list();
        require "views/header.php";
        require "views/user/main.php";
        require "views/footer.php";
    }

    function form()
    {
        require "views/header.php";
        require "views/user/form.php";
        require "views/footer.php";
    }

    function save()
    {
        $user = new User();
        $user->setEmail($_POST['email']);
        $user->setPassword(password_hash($_POST['password'],PASSWORD_BCRYPT));
        $user->setName($_POST['name']);
        $user->setRoles_Id($_POST['role']);
        $user->setState(1);

        $user->insert();

        header("location:?c=user");
    }

    function login()
    {
        require "views/user/formLogin.php";
    }

    function validate()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($this->model->login($email,$password))
        {
            header('location: index.php');
        }else{
            header('location: index.php?error');
        }
    }

    function logout()
    {
        session_destroy();
        header('location: index.php');
    }

    function updateStatus()
    {
       $usuario = new user();
        $id = intval($_GET['id']);
        $state = intval($_GET['state']);
        if ($state == 1) {
            $state = 0;
        }else {
            $state = 1;
        }
        $usuario->update($id, $state);
        header('location:?c=user');
    }
}