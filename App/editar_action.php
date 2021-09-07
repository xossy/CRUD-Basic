<?php

require_once("vendor/autoload.php");
use usuarioDaoMy\UsuarioDaoMysql\UsuarioDaoMysql;
use App\Usuario\Usuario;

$usuarioDao = new UsuarioDaoMysql($pdo);
$id = filter_input(INPUT_POST, 'id');
$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

if($id && $email && $senha){
    
    $usuario = new Usuario();
    $usuario->setEmail($email);
    $usuario->setSenha($senha);
    $usuario->setId($id);

    $usuarioDao->update($usuario);

    header("location: index.php");
    exit;
}else{
    header("location: index.php?id=".$id);
    exit;
}

?>