<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$ddd = filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_NUMBER_INT);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);

//echo "Nome: $nome";

$result_usuario = "UPDATE cliente SET nome='$nome', email='$email', ddd='$ddd', telefone='$telefone', cpf='$cpf', modified=NOW() WHERE id='$id'";
$result = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style= 'color: green'> Usuário foi editado com sucesso! </p>";
    header("Location: index.php");
}else{
    $_SESSION['msg'] = "<p style= 'color: red'> Usuário não foi editado! </p>";
    header("Location: editar.php?id=$id");
}

?>
