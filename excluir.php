<?php
require_once 'config.php';
require_once 'UsuarioDaoMysql.php';

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


