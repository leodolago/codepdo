<?php
require_once 'Alunos.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=projetopdo","root","root");

} catch (\PDOException $e){

    echo "Não foi possível estabelecer a conexão com o banco de dados:Erro código ".$e->getCode().": ".$e->getMessage();

};

$aluno = new Alunos($conexao);

$aluno->setId($_POST['id'])
    ->setNome($_POST['nome'])
    ->setNota($_POST['nota']);

$resultado = $aluno->alterar();

?>

<h4> Altera um aluno:</h4>
<hr>
<form method="post" >
    <p>Id: <input type="text" name="id" value="<?php echo $resultado['id']?>" /></p>
    <p>Nome: <input type="text" name="nome" value="<?php echo $resultado['nome']?>" /></p>
    <p>Nota: <input type="text" name="nota" value="<?php echo $resultado['nota']?>" /></p>
    <input type="submit" value="Alterar">
</form>
<hr>
<form method="" action="index.php">
    <input type="submit" value="<-- voltar para lista">
</form>

<h4>Lista de Alunos </h4>

<div STYLE="margin-left: 50px">

    <?php
    foreach ($aluno->listar("nome") as $alu) {
        echo "Id do Aluno: ".$alu['id']."<br/>Nome: ".$alu['nome']."<br/>Nota: ".$alu['nota'] ?><br><hr><?php ;
    }
    ?>
</div>