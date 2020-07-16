<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$ddd = filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_NUMBER_INT);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);

//echo "Nome: $nome";

$result_usuario = "INSERT INTO cliente (nome, email, ddd, telefone, cpf, created) VALUES ('$nome', '$email', '$ddd', '$telefone', '$cpf', NOW())";
$result = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style= 'color: green'> Usuário cadastrado! </p>";
    header("Location: index.php");
}else{
    $_SESSION['msg'] = "<p style= 'color: red'> Usuário não cadastrado! </p>";
    header("Location: cadastro.php");
}

?>
