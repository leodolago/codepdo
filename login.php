<?php

session_start();
require 'conecta.php';

if(isset($_POST['usuario']) && empty($_POST['usuario']) == false){

    $user = addslashes($_POST['usuario']);
    $pass = addslashes($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE usuario = '$user' AND senha = '$pass' ";
    $resultado = $conexao->query($sql);

    if($resultado->rowCount() > 0){
        $dado = $resultado->fetch();

        $_SESSION['id'] = $dado['id'];
        header("Location: index.php");

    } else {

        echo "Usuário ou senha invalido";
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
        <form method="POST">
            <div class="row">
                <div class="col s12">
                    <h4>Login</h4>
                </div>
                <div class="input-field col s12">
                    <input id="text" type="text" class="validate" name="usuario">
                    <label for="password">Usuario</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="text" type="password" class="validate" name="senha">
                    <label for="email">Senha</label>
                </div>
            </div>
            <div class="input-field col s12">
                <button class="btn waves-effect waves-light" type="submit" name="action">Login
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
        <div class="row"></div>
        <div class="col s12">
            <a href="cadastrousuario.php">Cadastrar novo usuário</a>
        </div>
    </div>
    <div class="col s4"></div>
</div>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

</body>
</html>