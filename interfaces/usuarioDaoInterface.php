<?php
require_once("vendor/autoload.php");
use App\Usuario\Usuario;

interface UsuarioDAO{

    public function add(Usuario $usuario); 
    public function findAll();//pegue tudo
    public function findbyEmail($email);
    public function findById($id);// buscar por uma pessoa só
    public function update(Usuario $usuario);
    public function delete($id);
    public function deleteTudo();
}
?>
