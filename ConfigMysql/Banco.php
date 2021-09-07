<?php
namespace ConfigMysql\Banco;

use PDO;
use PDOException;

class Banco
{
    private static $dbNome = "usuario";
    private static $dbHost = "host=127.0.0.1";
    private static $dbUsuario = "root";
    private static $dbSenha = " ";
    
    private static $cont = null;
    
    public function __construct() 
    {
        die('A função Init nao é permitido!');
    }
    
    public static function conectar()
    {
        if(null == self::$cont)
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbNome, self::$dbUsuario, self::$dbSenha); 
            }
            catch(PDOException $exception)
            {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }
    
    public static function desconectar()
    {
        self::$cont = null;
    }
}
//$pdo = new PDO("mysql:dbname=usuario; host=127.0.0.1", "root", "");
?>

