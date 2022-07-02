<?php
session_start();
include ('../Model/Conecta.php');
if(empty($_POST['login']) || empty($_POST['senha'])) {
    header('location:index.php');
    exit();
}
$login = mysqli_real_escape_string($db, $_POST['login']);
$senha = mysqli_real_escape_string($db, $_POST['senha']);

$query = "select login, perfil from usuario where login = '{$login}' and senha = md5('{$senha}')";

$result = mysqli_query($db, $query);

$linha = mysqli_num_rows($result);

if($linha == 1) {
    $_SESSION['login'] = $login;
    $resultado = mysqli_fetch_array($result);
    $_SESSION['perfil'] = $resultado['perfil'];
    header('Location:painel.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location:index.php');
    exit();
}
