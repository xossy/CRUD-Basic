<?php
require_once("vendor/autoload.php");

use usuarioDaoMy\UsuarioDaoMysql\UsuarioDaoMysql;
$usuarioDao = new UsuarioDaoMysql($pdo);
$usuario = false;

$id = filter_input(INPUT_GET, 'id');

if($id){
    $usuario = $usuarioDao->findById($id);
}
if($usuario === false){
    header("location: index.php");
    exit;
}

?>

<h1> Editar usuario </h1>

<form method="POST" action="editar_action.php">
    <input type="hidden" name="id" value="<?=$usuario->getId();?>" />
    <label>
        E-mail:<br/>
        <input type="email" name="email" value="<?=$usuario->getEmail();?>"/>
    </label><br/><br/>
    
    <label>
        Senha:<br/>
        <input type="password" name="senha" value="<?=$usuario->getSenha();?>" />
    </label><br/><br/>

    <input type="submit" value="Salvar"/>
</form>