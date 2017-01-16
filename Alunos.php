<?php

/**
 * Created by PhpStorm.
 * User: leonardo
 * Date: 21/12/16
 * Time: 08:14
 */

class Alunos
{
    private $db;

    private $id;
    private $nome;
    private $nota;

    public function __construct(\PDO $db){
        $this->db = $db;
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
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':nota', $this->getNota());

        if($stmt->execute()){
            return true;
        }
    }

    public function alterar(){

        $query = "Update alunos set nome=:nome, nota=:nota Where id=:id";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':nota', $this->getNota());

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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixenomed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
        return $this;
    }


}


