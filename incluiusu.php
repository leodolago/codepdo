<?php

require_once 'conecta.php';
require_once 'Usuarios.php';
require_once 'ServiceDbUser.php';

if(isset($_POST['usuario']) && empty($_POST['usuario']) == false){

    $usuario= new Usuarios();
    $usuario->setUsuario(addslashes($_POST['usuario']))
        ->setSenha(addslashes($_POST['senha']));

    $serviceDbUser = new ServiceDbUser($conexao, $usuario);
    $serviceDbUser->inserir();

    header("Location: cadastrousuario.php");

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
                    <h4>Incluir novo usuário</h4>
                </div>
                <div class="input-field col s12">
                    <input id="nom" type="text" class="validate" name="usuario">
                    <label for="nom">Usuário</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="not" type="text" class="validate" name="senha">
                    <label for="not">Senha</label>
                </div>
            </div>
            <div class="input-field col s12">
                <button class="btn waves-effect waves-light" type="submit" name="action">Incluir
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
        <form method="" action="cadastrousuario.php">
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