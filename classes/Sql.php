<?php

/**
 * Created by PhpStorm.
 * User: anderson
 * Date: 12/10/17
 * Time: 17:49
 */
class Sql extends PDO
{
    private $conectar;

    public function __construct()
    {
        $this->conectar = new PDO("mysql:host=localhost;dbname=meusite", "root", "");
    }
    private function setParams($statment, $parametrs = array())
    {
        foreach ( $parametrs as $key => $value )
        {
            $this->setParam($key, $value);
        }
    }
    private function setParam($statment, $key, $value)
    {
        $this->bindParam($key, $value);
    }
    public function query($ramQuery, $params = array())
    {
        $stmt = $this->conectar->prepare($ramQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt ;
    }
    public function select($rawQuery, $params = array())
    {
        $stmt = $this->query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}