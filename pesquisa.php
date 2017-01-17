<?php
require_once 'Alunos.php';
require_once 'ServiceDb.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=projetopdo","root","root");

} catch (\PDOException $e){

    echo "Não foi possível estabelecer a conexão com o banco de dados:Erro código ".$e->getCode().": ".$e->getMessage();

};


// Aqui funciona
$aluno = new Alunos();

$serviceDb = new ServiceDb($conexao, $aluno);

$resultado = $serviceDb->find($_GET['search']);



?>
 <h4> Aluno pesquisado:</h4>
 <hr>
 <form method="get">
 <p>Id do Aluno: <?php echo $resultado['id'];?> </p>
 <p>Nome: <?php echo $resultado['nome']?> </p>
 <p>Nota: <?php echo $resultado['nota']?> </p>
 </form>
 <hr>
 <form method="" action="index.php">
    <input type="submit" value="<-- voltar para lista">
</form>



<?php
/*Aqui nao funciona ------------------------------------
$aluno = new Alunos();

$serviceDb = new ServiceDb($conexao, $aluno);

$serviceDb->find($_GET['search']);



?>
<h4> Aluno pesquisado:</h4>
<hr>
<form method="get">
    <p>Id do Aluno: <?php echo $serviceDb['id'];?> </p>
    <p>Nome: <?php echo $serviceDb['nome']?> </p>
    <p>Nota: <?php echo $serviceDb['nota']?> </p>
</form>
<hr>
<form method="" action="index.php">
    <input type="submit" value="<-- voltar para lista">
</form>
*/