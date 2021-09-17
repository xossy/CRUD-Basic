<?php

require '../../vendor/autoload.php';

use App\Classes\Usuario;
use App\UsuarioD\UsuarioDaoMysql;
use App\configMysql\Banco;

$pdo = Banco::conectar();
$usuarioDao = new UsuarioDaoMysql($pdo);
Banco::desconectar();

$email = filter_input(INPUT_POST, 'email');
$senha = filter_input(INPUT_POST, 'senha');

if($email && $senha){
    if($usuarioDao->findByEmail($email) === false){ 

        $novoUsuario = new Usuario;
        $novoUsuario->setEmail($email);
        $novoUsuario->setSenha($senha);

        $usuarioDao->add($novoUsuario);

        header("location: ../../Index.php");
        exit;
    }else{

        header("location: ../../Index.php");
        exit;
    }
}else{

    header("location: ../../Index.php");
    exit;
}
?>