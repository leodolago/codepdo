<?php

class ServiceDbUser
{
    private $db;
    private $usuarios;

    public function __construct(\PDO $db, Usuarios $usuarios)
    {
        $this->db = $db;
        $this->usuarios = $usuarios;
    }

    public function find($id){

        $query = "Select * from usuarios where id=:id ";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function listar($ordem = null){

        if ($ordem) {

            $query = "Select * from usuarios order by ($ordem)";

        } else{

            $query = "Select * from usuarios";
        }

        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function inserir(){
        $query = "Insert into usuarios(usuario,senha) VALUES (:usuario, :senha)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':usuario', $this->usuarios->getUsuario());
        $stmt->bindValue(':senha', $this->usuarios->getSenha());

        if($stmt->execute()){
            return true;
        }
    }

    public function alterar(){

        $query = "Update usuarios set usuario=:usuario, senha=:senha Where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->usuarios->getId());
        $stmt->bindValue(':usuario', $this->usuarios->getUsuario());
        $stmt->bindValue(':senha', $this->usuarios->getSenha());

        if($stmt->execute()){
            return true;
        }

    }

    public function deletar($id){

        $query = "Delete from usuarios Where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);


        if($stmt->execute()){
            return true;
        }

    }

}