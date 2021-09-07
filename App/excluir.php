<?php
require_once("vendor/autoload.php");
use usuarioDaoMy\UsuarioDaoMysql\UsuarioDaoMysql;
$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id){
    $usuarioDao->delete($id);
    header("location: index.php");
    exit;
}else{
    header("location: index.php");
    exit;
}


