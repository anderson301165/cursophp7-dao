<?php
/**
 * Created by PhpStorm.
 * User: anderson
 * Date: 12/10/17
 * Time: 18:27
 */
require_once("config.php");

$sql = new Sql();
$usuarios = $sql->select("select * from administrador");
echo(json_encode($usuarios));