<?php

class roles
{
    private $id = null;
    private $name = null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect();
    }
    
    public function list()
    {
        try {
            $query = $this->connection->prepare("SELECT * FROM roles");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
        } catch ( Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert()
    {
        try {
            $query = "INSERT INTO roles (name) VALUES (?);";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->name
                            ));
            $this->id = $this->connection->lastInsertId();
            return $this;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update(){
        try {
            $query = "UPDATE roles SET
                            name = ?,
                            WHERE id = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getName(),
                                $this->getId()
                            ));
            return $this;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } 

    public function getById($id)
    {
        try {
            $query = "SELECT * FROM roles WHERE id=?;";
            $query = $this->connection->prepare($query);
            $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
            $query->execute(array($id));
            return $query->fetch();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete()
    {
        try {
            $query = "DELETE FROM roles WHERE id=?;";
            $this->connection->prepare($query)
                    ->execute(array($this->id));
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    function getId() : ?int
    {
        return $this->id;
    }
    function setId(int $id)
    {
        $this->id = $id;
    }
    function getName() : ?string
    {
        return $this->name;
    }
    function setName(string $name)
    {
        $this->name = $name;
    }
    
}