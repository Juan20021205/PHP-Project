<?php
require_once "models/roles.php";

class rolesController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new roles();
    }

    public function index()
    {
        
        $roles = $this->model->list();
        require "views/header.php";
        require "views/roles/main.php";
        require "views/footer.php";
    }

    public function form(){
        $roles = new roles();
        if(isset($_GET['id'])){
            $roles = $roles->getById($_GET['id']);
        }
        require "views/header.php";
        require "views/roles/form.php";
        require "views/footer.php";
    }

    public function save(){
        $roles = new roles();
        $id = intval($_POST['id']); 
        $roles->setName($_POST['name']);
        if ($id = 0) {
            $roles->update();
        }
        else{
            $roles->insert();
        }
        
        header('location:?c=roles');
    }

    public function delete()
    {
        $roles = new roles();
        $roles=$roles->getById($_GET['id']);
        $roles->delete();
        header('location:?c=roles');
    }
}