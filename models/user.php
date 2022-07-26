<?php

class User
{
    private $id = null;
    private $email = null;
    private $password = null;
    private $name = null;
    private $roles_id = null;
    private $state = null;

    private $connection;

    function __CONSTRUCT()
    {
        $this->connection = database::Connect();
    }

    public function list()
    {
        try {
            $query = $this->connection->prepare("SELECT * FROM users");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
        } catch ( Exception $e) {
            die($e->getMessage());
        }
    }

    function insert()
    {
        try {
            $query = "INSERT INTO users (email, password, name, roles_id, state) VALUES (?,?,?,?,?);";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->email,
                                $this->password,
                                $this->name,
                                $this->roles_id,
                                $this->state
                            ));
            $this->id = $this->connection->lastInsertId();
            return $this;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function login($email, $password) : bool
    {
        try {
            $query = $this->connection->prepare("SELECT * FROM users WHERE email=?;");
            $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
            $query->execute(array(
                                $email
                                ));
            $result = $query->fetch();
            $result->connection = '';
            if (password_verify($password, $result->getPassword()))
            {
                $_SESSION['user']= $result;
                return true;
            }else {
                session_destroy();
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($id,$state)
    {
        try {
            $query = $this->connection->prepare("UPDATE users SET state = ? WHERE id = ?;");
            $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
            $query->execute(array($state, $id));
            return $query;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
     
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getEmail()
    {
        return $this->email;
    } 
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    } 
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getRoles_Id()
    {
        return $this->roles_id;
    }
    public function setRoles_Id($roles_id)
    {
        $this->roles_id = $roles_id;
    }
    public function getState()
    {
        return $this->state;
    }
    public function setState($state)
    {
        $this->state = $state;
    }
}