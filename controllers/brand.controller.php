<?php
require_once "models/brand.php";

class brandController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new brand();
    }

    
    function test(){
        var_dump(Database::Connect());
    }


    public function index()
    {
        $brand = $this->model->list();
        require "views/header.php";
        require "views/brand/main.php";
        require "views/footer.php";
    }

    public function form(){
        $brand = new brand();
        if(isset($_GET['id'])){
            $brand = $brand->getById($_GET['id']);
        }
        require "views/header.php";
        require "views/brand/form.php";
        require "views/footer.php";
    }

    public function save(){
        $brand = new brand();
        $id = intval($_POST['id']);
        if ($id) {
            $brand = $brand->getById($id);
        }
        $brand->setName($_POST['name']);
        $brand->setDescription($_POST['description']);
        
        $id ? $brand->update() : $brand->insert();
        
        header('location:?c=brand');
    }

    public function delete()
    {
        $brand = new brand();
        $brand=$brand->getById($_GET['id']);
        $brand->delete();
        header('location:?c=brand');
    }
}