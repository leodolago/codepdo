<?php

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=projetopdo","root","root");

} catch (\PDOException $e){

    echo "Conexão falhou: ".$e->getMessage();

}
    
    