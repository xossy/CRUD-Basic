<?php
namespace App\Classes;

class Usuario{

    private $id;
    private $email;
    private $senha;

    public function getId(){
        
        return $this->id;
    }
    public function setId($id){

        $this->id = trim($id); 
    }

    public function getEmail(){

        return $this->email;
    }
    public function setEmail($email){

        $this->email = strtolower(trim($email));
    }

    public function getSenha(){

        return $this->senha;
    }
    public function setSenha($senha){

        $this->senha = md5(trim($senha));
    }
}
