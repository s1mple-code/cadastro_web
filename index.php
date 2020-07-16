<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista de Usuários</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="conexao.js"></script>
    <link rel="stylesheet" href="stile.css">
</head>

<body>
    <h1>Lista de Usuários</h1>

    <form action="cadastro.php" method="POST">
     <button type="submit" onclick="index.php">Cadastrar</button>
    </form><br>

    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    };

    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

    $pagina = (!empty($pagina_atual)) ? $pagina_atual: 1;

    $qnt_result_pg = 4;

    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    $result_usuarios = "SELECT * FROM cliente LIMIT $inicio, $qnt_result_pg";
    $result_final = mysqli_query($conn, $result_usuarios);

    while($row_usuario = mysqli_fetch_assoc($result_final)){
        echo "ID: " . $row_usuario['id'] . "<br>";
        echo "Nome: " . $row_usuario['nome'] . "<br>";
        echo "Email: " . $row_usuario['email'] . "<br>";
        echo "DDD: " . $row_usuario['ddd'] . "  ";
        echo "Telefone: " . $row_usuario['telefone'] . "<br>";
        echo "CPF: " . $row_usuario['cpf'] . "<br>";
        echo "<a href='editor.php?id=" . $row_usuario['id'] . "'>Editar</a><hr>";
    }

    $result_pg = "SELECT COUNT(id) AS num_result FROM cliente";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    $max_link = 2;

    echo "<a href = 'index.php?pagina=1'> Inicío </>";

    for($pag_ant = $pagina - $max_link; $pag_ant <= $pagina - 1; $pag_ant++){
        
        if($pag_ant >= 1){
            echo "<a href = 'index.php?pagina=$pag_ant'> $pag_ant </a>";
        }
    }

    echo "  $pagina ";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_link; $pag_dep++){

        if($pag_dep <= $quantidade_pg){
            echo "<a href = 'index.php?pagina=$pag_dep'> $pag_dep </a>";
        }
    }

    echo "<a href = 'index.php?pagina=$quantidade_pg'> Fim </a>";

    ?>

</body>

</html>