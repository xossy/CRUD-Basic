<?php

use App\UsuarioD\UsuarioDaoMysql;
use App\configMysql\Banco;

require 'vendor/autoload.php';

$pdo = Banco::conectar();
$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findAll();
Banco::desconectar();

?>
<a href="App/Views/adicionar.php">ADICIONAR USUÁRIO</a><br/>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>EMAIL</th>
        <th>SENHA</th>
        <th>AÇÕES</th>
    </tr>
    <?PHP foreach($lista as $usuario):?>
    <tr>
        <td><?php echo $usuario->getId();?></td>
        <td><?php echo $usuario->getEmail();?></td>
        <td><?php echo $usuario->getSenha();?></td>
        <td>
            <a href="App/Views/editar.php?id=<?=$usuario->getId();?>"> [ Editar ] </a>
            <a href="App/Views/excluir.php?id=<?=$usuario->getId();?>"> [ Excluir ] </a>
        </td>
    </tr>
    <?php endforeach;?>
    <a href="APP/Views/excluirTudo.php"> [ Excluir Tudo ] </a>
</table>

