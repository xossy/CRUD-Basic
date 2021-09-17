<?php

require '../../vendor/autoload.php';

use App\UsuarioD\UsuarioDaoMysql;
use App\configMysql\Banco;

$pdo = Banco::conectar();
$usuarioDao = new UsuarioDaoMysql($pdo);
Banco::desconectar();

$usuarioDao->deleteTudo();
header("location: ../../Index.php");
exit;
