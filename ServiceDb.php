<?php


class ServiceDb
{
    private $db;
    private $alunos;

    public function __construct(\PDO $db, Alunos $alunos)
    {
        $this->db = $db;
        $this->alunos = $alunos;
    }

public function find($id){

    $query = "Select * from alunos where id=:id ";
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

public function listar($ordem = null){

    if ($ordem) {

        $query = "Select * from alunos order by ($ordem)";

    } else{

        $query = "Select * from alunos";
    }

    $stmt = $this->db->query($query);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);

}

public function inserir(){
    $query = "Insert into alunos(nome,nota) VALUES (:nome, :nota)";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':nome', $this->alunos->getNome());
    $stmt->bindValue(':nota', $this->alunos->getNota());

    if($stmt->execute()){
        return true;
    }
}

public function alterar(){

    $query = "Update alunos set nome=:nome, nota=:nota Where id=:id";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':id', $this->alunos->getId());
    $stmt->bindValue(':nome', $this->alunos->getNome());
    $stmt->bindValue(':nota', $this->alunos->getNota());

    if($stmt->execute()){
        return true;
    }

}

public function deletar($id){

    $query = "Delete from alunos Where id=:id";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':id', $id);


    if($stmt->execute()){
        return true;
    }

}


}