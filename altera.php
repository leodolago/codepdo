<?php

require_once 'conecta.php';
require_once 'Alunos.php';
require_once 'ServiceDb.php';

$id = 0;

if(isset($_GET['id']) && empty($_GET['id']) == false){

    $id = addslashes($_GET['id']);


    if(isset($_POST['nome']) && empty($_POST['nome'] == false)) {

        $aluno = new Alunos();

        $aluno->setId(addslashes($_POST['id']))
            ->setNome(addslashes($_POST['nome']))
            ->setNota(addslashes($_POST['nota']));

        $serviceDb = new ServiceDb($conexao, $aluno);

        $serviceDb->alterar();

        header("location: index.php");

    }

    $aluno = new Alunos();

    $serviceDb = new ServiceDb($conexao, $aluno);

    $resultado = $serviceDb->find($_GET['id'],'');

    if($resultado > 0){



    } else {

        header("Location: index.php");

    }

}

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

<div class="row">
    <div class="col s4"></div>
    <div class="col s4">
        <form method="post">
            <div class="row">
                <div class="col s12">
                    <h4>Alterar dados do aluno</h4>
                </div>
                <div class="input-field col s12">
                    <input id="ids" type="text" class="validate" name="id"  value="<?php echo $resultado['id'] ?>">
                    <label for="ids">Id</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="not" type="text" class="validate" name="nome" value="<?php echo $resultado['nome'] ?>">
                    <label for="not">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="not" type="text" class="validate" name="nota" value="<?php echo $resultado['nota'] ?>">
                    <label for="not">Nota</label>
                </div>
            </div>
            <div class="input-field col s12">
                <button class="btn waves-effect waves-light" type="submit" name="action">Alterar
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
        <form method="" action="index.php">
            <div class="input-field col s12">
                <button class="btn waves-effect waves-light" type="submit" name="action">Voltar para lista
                    <i class="material-icons left">arrow_back</i>
                </button>
            </div>
        </form>
    </div>
    <div class="col s4"></div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

</body>
</html>