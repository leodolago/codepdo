<?php
require_once 'Alunos.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=projetopdo","root","root");

} catch (\PDOException $e){

    echo "Não foi possível estabelecer a conexão com o banco de dados:Erro código ".$e->getCode().": ".$e->getMessage();

};

$aluno = new Alunos($conexao);


$resultado = $aluno->find($_GET['search']);


?>
 <h4> Aluno pesquisado:</h4>
 <hr>
 <form method="get">
 <p>Id do Aluno: <?php echo $resultado['id']?> </p>
 <p>Nome: <?php echo $resultado['nome']?> </p>
 <p>Nota: <?php echo $resultado['nota']?> </p>
 </form>
 <hr>
 <form method="" action="index.php">
    <input type="submit" value="<-- voltar para lista">
</form>
