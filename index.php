<?php
/**
 * Created by PhpStorm.
 * User: anderson
 * Date: 12/10/17
 * Time: 18:27
 */
require_once("config.php");
/* retorna uma unica linha da tabela
$usuario = new Usuario();
$usuario->loadById(3);
echo($usuario);
*/
/* retorna todos os dados
$listadados = Usuario::todosUsuarios();
var_dump($listadados);
*/

$usuario = new Usuario();
$usuario->login("blogname", "Cliejjnte");
echo($usuario);
