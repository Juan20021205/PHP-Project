<?php

class Product
{
    private $id = null;
    private $name = null;
    private $cost = null;
    private $price = null;
    private $quantity = null;
    private $brand_id = null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect();
    }

    public function list()
    {
        try {
            $query = $this->connection->prepare("SELECT * FROM products");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);
        } catch ( Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert()
    {
        try {
            $query = "INSERT INTO products (name,cost,price,quantity,bran_id) VALUES (?,?,?,?,?);";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->name,
                                $this->cost,
                                $this->price,
                                $this->quantity,
                                $this->bran_id
                            ));
            $this->id = $this->connection->lastInsertId();
            return $this;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update(){
        try {
            $query = "UPDATE products SET
                            name = ?,
                            cost = ?, 
                            price = ?,
                            quantity = ?,
                            bran_id = ?
                            WHERE id = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getName(),
                                $this->getCost(),
                                $this->getPrice(),
                                $this->getQuantity(),
                                $this->getBrandId(),
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
            $query = "SELECT * FROM products WHERE id=?;";
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
            $query = "DELETE FROM products WHERE id=?;";
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
    function getCost() : ?float
    {
        return $this->cost;
    }
    function setCost(int $cost)
    {
        $this->cost = $cost;
    }
    function getPrice() : ?float
    {
        return $this->price;
    }
    function setPrice(int $price)
    {
        $this->price = $price;
    }
    function getQuantity() : ?int
    {
        return $this->quantity;
    }
    function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }
    function getBrandId() : ?int
    {
        return $this->brand_id;
    }
    function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;
    }
}