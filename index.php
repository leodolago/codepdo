
<?php

session_start();
require 'conecta.php';

require_once 'Alunos.php';
require_once 'ServiceDb.php';

if(!isset($_SESSION['id']) && !empty($_SESSION['id']) == false){
    header("Location: login.php");
}


$listar = "nome";
$aluno = new Alunos();

$serviceDb = new ServiceDb($conexao, $aluno);

$listar = $_GET['lista'];


?>

<html>
<head>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col s1"></div>
        <div class="col s10">
            <div class="row">
                <div class="col s12">
                    <h4>Cadastro de Alunos do curso</h4>
            <nav>
                <div class="nav-wrapper">
                    <div class="row">
                        <div class="col s6">
                        <form method="get" action="pesquisa.php">
                            <div class="input-field col s8">
                                    <input id="search" type="search" name="search" />
                                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                </div>
                            <div class="col s4">
                                <ul class="left">
                                    <li><button class="btn waves-effect waves-light" type="submit">Pesquisar</button></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                        <div class="col s6">
                        <form method="" action="inclui.php">
                            <div class="input-field col s12">
                                <ul class="left">
                                <li><button class="btn waves-effect waves-light" type="submit" name="action">
                                        Incluir Novo</button></li>
                                </ul>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </nav>
                </div></div>
            <div class="row">
        <div class="col s12">
        <h5>Lista completa de Alunos</h5>
        <div>Orderm <a <?php echo 'href="index.php?lista=nome" ' ?> >alfabetica</a> ou <a <?php echo 'href="index.php?lista=nota" ' ?> >notas</a></div>
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Nota</th>
                    <th>Ações</th>
                </tr>
                <tbody>
                <?php
                foreach ($serviceDb->listar("$listar") as $dado) {
                    echo '<tr>';
                    echo '<th>' . $dado['id'] . '</th>';
                    echo '<th>' . $dado['nome'] . '</th>';
                    echo '<th>' . $dado['nota'] . '</th>';
                    echo '<th><a class="waves-effect waves-light btn" href="altera.php?id='.$dado['id'].'">Alterar</a>
<a class="waves-effect waves-light btn" href="exclui.php?id='.$dado['id'].'">Excluir</a>';
                    echo '</tr>';
                } ?>
                </tbody>
                </thead>
            </table>
        </div>
            </div></div>
    <div class="col s1"></div>
    </div>
</div>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

</body>
</html>