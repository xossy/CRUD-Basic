<?php
namespace usuarioDaoMy\UsuarioDaoMysql;

require_once("vendor/autoload.php");
use PDO;
use App\Usuario\Usuario;

class UsuarioDaoMysql {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Usuario $usuario) {
        $sql = $this->pdo->prepare("INSERT INTO logar (senha, email) VALUES (:senha, :email)");
        $sql->bindValue(':senha', $usuario->getSenha());
        $sql->bindValue(':email', $usuario->getEmail());
        $sql->execute();

        $usuario->setId( $this->pdo->lastInsertId() );
        return $usuario;
    }

    public function findAll() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM logar");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $usuario = new Usuario();
                $usuario->setId($item['id']);
                $usuario->setSenha($item['senha']);
                $usuario->setEmail($item['email']);

                $array[] = $usuario;
            }
        }

        return $array;
    }

    public function findByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM logar WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $usuario = new Usuario();
            $usuario->setId($data['id']);
            $usuario->setSenha($data['senha']);
            $usuario->setEmail($data['email']);

            return $usuario;
        } else {
            return false;
        }
    }

    public function findById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM logar WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $usuario = new Usuario();
            $usuario->setId($data['id']);
            $usuario->setSenha($data['senha']);
            $usuario->setEmail($data['email']);

            return $usuario;
        } else {
            return false;
        }
    }

    public function update(Usuario $usuario) {
        $sql = $this->pdo->prepare("UPDATE logar SET email = :email, senha = :senha WHERE id = :id");
        $sql->bindValue(':id', $usuario->getId());
        $sql->bindValue(':email', $usuario->getEmail());
        $sql->bindValue(':senha', $usuario->getSenha());
        $sql->execute();

        return true;
    }

    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM logar WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
    public function deleteTudo(){
        $this->pdo->query("TRUNCATE TABLE logar"); 
    }
}

?>