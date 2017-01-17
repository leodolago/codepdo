<?php
require_once 'Alunos.php';
require_once 'ServiceDb.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=projetopdo","root","root");

} catch (\PDOException $e){

    echo "Não foi possível estabelecer a conexão com o banco de dados:Erro código ".$e->getCode().": ".$e->getMessage();

};


$aluno = new Alunos();

$aluno->setId($_POST['id'])
    ->setNome($_POST['nome'])
    ->setNota($_POST['nota']);

$serviceDb = new ServiceDb($conexao, $aluno);

$serviceDb->alterar();


?>

<h4> Altera um aluno:</h4>
<hr>
<form method="post" >
    <p>Id: <input type="text" name="id" value="" /></p>
    <p>Nome: <input type="text" name="nome" value="" /></p>
    <p>Nota: <input type="text" name="nota" value="" /></p>
    <input type="submit" value="Alterar">
</form>
<hr>
<form method="" action="index.php">
    <input type="submit" value="<-- voltar para lista">
</form>

<h4>Lista de Alunos </h4>

<div STYLE="margin-left: 50px">

    <?php
    foreach ($serviceDb->listar("nome") as $alu) {
        echo "Id do Aluno: ".$alu['id']."<br/>Nome: ".$alu['nome']."<br/>Nota: ".$alu['nota'] ?><br><hr><?php ;
    }
    ?>
</div>