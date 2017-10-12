<?php
/**
 * Created by PhpStorm.
 * User: anderson
 * Date: 12/10/17
 * Time: 18:21
 */
spl_autoload_register( function ($class_name)
{
    $filename = "classes".DIRECTORY_SEPARATOR.$class_name.".php";
    if( file_exists($filename) )
    {
        require_once($filename);
    }
});