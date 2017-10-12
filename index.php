<?php
/**
 * Created by PhpStorm.
 * User: anderson
 * Date: 12/10/17
 * Time: 18:27
 */
require_once("config.php");

$usuario = new Usuario();
$usuario->loadById(3);
echo($usuario);