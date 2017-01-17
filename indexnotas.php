
<?php
require_once 'Alunos.php';
require_once 'ServiceDb.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=projetopdo","root","root");

} catch (\PDOException $e){

    echo "Não foi possível estabelecer a conexão com o banco de dados:Erro código ".$e->getCode().": ".$e->getMessage();

};

$aluno = new Alunos();

$serviceDb = new ServiceDb($conexao, $aluno);


?>

<html>
<head>

<body>
<h1>Cadastro de Alunos do curso</h1>
<hr>
<div style="position: relative; height: 32px; background-color: aliceblue;">
    <div style="position: absolute; height: 26px; left: 6px; top:6px;" >
        <form method="get" action="pesquisa.php">
            <input type="search" name="search"><input type="submit" value="Pesquisar"><br/><br/>
        </form>
    </div>
    <div style="position: absolute; height: 26px; left: 266px; top:6px;">
        <form method="get" action="inclui.php">
            <input type="submit" value="Novo Aluno"><br/><br/>
        </form>
    </div>
    <div style="position: absolute; height: 26px; left: 366px; top:6px;">
        <form method="get" action="altera.php">
            <input type="submit" value="Altera Aluno"><br/><br/>
        </form>
    </div>
    <div style="position: absolute; height: 26px; left: 466px; top:6px;">
        <form method="get" action="exclui.php">
            <input type="submit" value="Exclui Aluno"><br/><br/>
        </form>
    </div>

</div>

<hr>
<h2>Lista completa de Alunos</h2>


<div>Orderm <a href="index.php">alfabetica</a> ou <a href="indexnotas.php">notas</a><h4>

        <div STYLE="margin-left: 50px">

            <?php
            foreach ($serviceDb->listar("nota") as $alu) {
                echo "Id do Aluno: ".$alu['id']."<br/>Nome: ".$alu['nome']."<br/>Nota: ".$alu['nota'] ?><br><hr><?php ;
            }
            ?>
        </div>

</body>
</html>