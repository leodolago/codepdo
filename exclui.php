<?php
require_once 'Alunos.php';
require_once 'ServiceDb.php';
require 'conecta.php';

if(isset($_GET['id']) && empty($_GET['id']) == false){

    $aluno = new Alunos();
    $serviceDb = new ServiceDb($conexao, $aluno);

    $serviceDb->deletar(addslashes($_GET['id']));

    header("Location: index.php");

} else {

    header("Location: index.php");

}

?>

