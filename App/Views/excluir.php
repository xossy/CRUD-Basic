<?php

require '../../vendor/autoload.php';

use App\UsuarioD\UsuarioDaoMysql;
use App\configMysql\Banco;

$pdo = Banco::conectar();
$usuarioDao = new UsuarioDaoMysql($pdo);
Banco::desconectar();

$id = filter_input(INPUT_GET, 'id');

if($id){
    $usuarioDao->delete($id);
    header("location: ../../Index.php");
    exit;
}else{
    header("location: ../../Index.php");
    exit;
}


