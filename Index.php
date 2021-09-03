<?php
require_once 'config.php';
require_once 'usuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findAll();

?>
<a href="adicionar.php">ADICIONAR USUÁRIO</a><br/>
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
            <a href="editar.php?id=<?=$usuario->getId();?>"> [ Editar ] </a>
            <a href="excluir.php?id=<?=$usuario->getId();?>"> [ Excluir ] </a>
        </td>
    </tr>
    <?php endforeach;?>
    <a href="excluirTudo.php?id"> [ Excluir Tudo ] </a>
</table>
<a href="excluirTudo.php">Apagar Tudo</a>