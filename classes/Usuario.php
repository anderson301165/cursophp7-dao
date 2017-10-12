<?php

/**
 * Created by PhpStorm.
 * User: anderson
 * Date: 12/10/17
 * Time: 18:58
 */
class Usuario
{
    private $option_id;
    private $option_name;
    private $option_value;
    private $autoload;

    public function getAutoload()
    {
        return $this->autoload;
    }
    public function setAutoload($autoload)
    {
        $this->autoload = $autoload;
    }

    public function getOptionId()
    {
        return $this->option_id;
    }
    public function setOptionId($option_id)
    {
        $this->option_id = $option_id;
    }

    public function getOptionName()
    {
        return $this->option_name;
    }
    public function setOptionName($option_name)
    {
        $this->option_name = $option_name;
    }

    public function getOptionValue()
    {
        return $this->option_value;
    }
    public function setOptionValue($option_value)
    {
        $this->option_value = $option_value;
    }

    public function loadById()
    {
        $sql = new Sql();
        $resultado = $sql->select("select * from wp_options where option_id = :id", array(
            ":id"=>$id
        ));
        if(count($resultado) > 0)
        {
            $row = $resultado[0];
            $this->setAutoload($row['autoload']);
            $this->setOptionId($row['option_id']);
            $this->setOptionName($row['option_name']);
            $this->setOptionValue($row['option_value']);
        }
    }
    public function  __toString()
    {
        return json_encode(array(
            "option_id"   => $this->getOptionId(),
            "option_name" => $this->getOptionName(),
            "option_value"=> $this->getOptionValue(),
            "autoload"    => $this->getAutoload()
        ));
    }
}