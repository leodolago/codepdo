
<?php
require_once 'Alunos.php';

try{
    $conexao = new \PDO("mysql:host=localhost;dbname=projetopdo","root","root");

} catch (\PDOException $e){

    echo "Não foi possível estabelecer a conexão com o banco de dados:Erro código ".$e->getCode().": ".$e->getMessage();

};

$aluno = new Alunos($conexao);

?>

<html>
<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

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
        <form method="post" action="novoaluno.php">
            <input type="submit" value="Novo Aluno"><br/><br/>
        </form>
    </div></div>

<hr>
<h2>Lista completa de Alunos</h2>


<div>Orderm <a href="index.php">alfabetica</a> ou <a href="indexnotas.php">notas</a><h4>

        <div STYLE="margin-left: 50px">

            <?php
            foreach ($aluno->listar("nota") as $alu) {
                echo "Id do Aluno: ".$alu['id']."<br/>Nome: ".$alu['nome']."<br/>Nota: ".$alu['nota'] ?><br><hr><?php ;
            }
            ?>
        </div>

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>