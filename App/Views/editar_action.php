<?php

require 'C:/xampp/htdocs/DAO/vendor/autoload.php';

use App\UsuarioD\UsuarioDaoMysql;
use App\Classes\Usuario;
use App\configMysql\Banco;

$pdo = Banco::conectar();
$usuarioDao = new UsuarioDaoMysql($pdo);
Banco::desconectar();

$id = filter_input(INPUT_POST, 'id');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

if($id && $email && $senha){
    
    $usuario = new Usuario();
    $usuario->setEmail($email);
    $usuario->setSenha($senha);
    $usuario->setId($id);

    $usuarioDao->update($usuario);

    header("location: ../../Index.php");
    exit;
}else{
    header("location: ../../Index.php?id=".$id);
    exit;
}

?>