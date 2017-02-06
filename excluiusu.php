<?php
require_once 'Usuarios.php';
require_once 'ServiceDbUser.php';
require 'conecta.php';

if(isset($_GET['id']) && empty($_GET['id']) == false){

    $usuario = new Usuarios();
    $serviceDbUser = new ServiceDbUser($conexao, $usuario);

    $serviceDbUser->deletar(addslashes($_GET['id']));

    header("Location: cadastrousuario.php");

} else {

    header("Location: cadastrousuario.php");

}

?>