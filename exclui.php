<?php
require_once 'Alunos.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=projetopdo","root","root");

} catch (\PDOException $e){

    echo "Não foi possível estabelecer a conexão com o banco de dados:Erro código ".$e->getCode().": ".$e->getMessage();

};

$aluno = new Alunos($conexao);


$resultado = $aluno->deletar($_GET['id']);

?>

<h4> Deleta o aluno pelo id:</h4>
<hr>
<form method="get" >
    <p>ID: <input type="text" name="id" value="" /></p>
    <input type="submit" value="Excluir">
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