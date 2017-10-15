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

    public function loadById($id)
    {
        $sql = new Sql();
        $resultado = $sql->select("select * from wp_options where option_id = :ID", array(
            ":ID"=>$id
        ));
        if(count($resultado) > 0)
        {
            $this->setDados($resultado[0]);
        }
    }
    public static function todosUsuarios()
    {
        $sql = new Sql();
        return $sql->select("select * from wp_options");

    }
    public static function buscarUsuario($estudante)
    {
        $sql = new Sql();
        return $sql->select("select * from wp_options where option_name like :nome", array(
            ":nome"=>"%".$estudante."%"
        ));
    }
    public function login($usr, $pass)
    {
        $sql = new Sql();
        $resultado = $sql->select("select * from wp_options where option_name = :usr and option_value = :pass ", array(
            ":usr"=>$usr,
            ":pass"=>$pass
        ));
        if(count($resultado) > 0)
        {
            $this->setDados($resultado[0]);

        }
        else
        {
            throw new Exception("usuario não encontrado");
        }
    }

    public function setDados($dados)
    {
        $this->setAutoload($dados['autoload']);
        $this->setOptionId($dados['option_id']);
        $this->setOptionName($dados['option_name']);
        $this->setOptionValue($dados['option_value']);
    }

    public function insert(){
        $sql = new Sql();
        $resultado = $sql->select("CALL estudantes(:NAM, :pass)", array(
            ":NAM"=>$this->getOptionName(),
            ":pass"=>$this->getOptionValue()
        ));
        if( count($resultado) > 0 )
        {
            $this->setDados($resultado[0]);
        }

    }

    public function update($login, $senha, $id)
    {
        $this->setOptionName($login);
        $this->setOptionValue($senha);
        $this->setOptionId($id);
        $sql = new Sql();
        $sql->query("update set option_name =:nome, option_value = :senha where option_id = :id", array(
            ":nome"=>$this->getOptionName(),
            ":senha"=>$this->getOptionValue(),
            ":id"=>$this->getOptionId()
        ));
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