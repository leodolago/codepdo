<?php
require_once 'Alunos.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=projetopdo","root","root");

} catch (\PDOException $e){

    echo "Não foi possível estabelecer a conexão com o banco de dados:Erro código ".$e->getCode().": ".$e->getMessage();

};

$aluno = new Alunos($conexao);

$aluno->setNome($_POST['nome'])
    ->setNota($_POST['nota']);

$resultado = $aluno->inserir();

?>

<h4> Inclui um novo aluno:</h4>
<hr>
<form method="post" >
    <p>Nome: <input type="text" name="nome" value="<?php echo $resultado['nome']?>" /></p>
    <p>Nota: <input type="text" name="nota" value="<?php echo $resultado['nota']?>" /></p>
    <input type="submit" value="Incluir">
</form>
<hr>
<form method="" action="index.php">
<input type="submit" value="<-- voltar para lista">
</form>