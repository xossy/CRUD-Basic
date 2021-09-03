<?php
require_once 'config.php';
require_once 'UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$usuarioDao->deleteTudo();
header("location: index.php");
exit;
