<?php
require_once("vendor/autoload.php");
use usuarioDaoMy\UsuarioDaoMysql\UsuarioDaoMysql;

$usuarioDao = new UsuarioDaoMysql($pdo);
$usuarioDao->deleteTudo();
header("location: index.php");
exit;
