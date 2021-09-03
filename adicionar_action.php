<?php
require_once 'config.php';
require_once 'usuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

echo $email = filter_input(INPUT_POST, 'email');
echo $senha = filter_input(INPUT_POST, 'senha');


if($email && $senha){
    if($usuarioDao->findByEmail($email) === false){ // se ele não tiver achado nenhum usuario com esse email
       
        $novoUsuario = new Usuario;
        $novoUsuario->setEmail($email);
        $novoUsuario->setSenha($senha);

        $usuarioDao->add($novoUsuario);

        header("location: index.php");
        exit;
    }else{

        header("location: index.php");
        exit;
    }
}else{

    header("location: index.php");
    exit;
}