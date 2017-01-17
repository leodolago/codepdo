<?php
require_once 'Alunos.php';
require_once 'ServiceDb.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=projetopdo","root","root");

} catch (\PDOException $e){

    echo "Não foi possível estabelecer a conexão com o banco de dados:Erro código ".$e->getCode().": ".$e->getMessage();

};

$aluno = new Alunos();

$aluno->setNome($_POST['nome'])
       ->setNota($_POST['nota']);

$serviceDb = new ServiceDb($conexao, $aluno);

$serviceDb->inserir();

?>

<h4> Inclui um novo aluno:</h4>
<hr>
<form method="post" >
    <p>Nome: <input type="text" name="nome" value="" /></p>
    <p>Nota: <input type="text" name="nota" value="" /></p>
    <input type="submit" value="Incluir">
</form>
<hr>
<form method="" action="index.php">
<input type="submit" value="<-- voltar para lista">
</form>