<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result_usuario = "SELECT * FROM cliente WHERE id = '$id' ";

$resulto_usuario = mysqli_query($conn, $result_usuario);

$row_usuario = mysqli_fetch_assoc($resulto_usuario);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista Telefonica</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="conexao.js"></script>
    <link rel="stylesheet" href="stile.css">
</head>

<body>
    <h1>Editar Usuário</h1>

    <form action="index.php" method="POST">
     <button type="submit" onclick="listar.php">Voltar</button>
    </form><br>

    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    };
    function listar(){
        header("Location: index.php");
    }
    ?>

    <form name="form_user" action="processa_edicao.php" method="POST">
        <div class="wrapper">
            <div>
              <label>Nome:</label><br><br>
              <label>E-mail:</label><br><br>  
              <label>DDD:</label> 
              <label>Telefone:</label><br><br> 
              <label>CPF:</label><br><br> 
            </div>
            <div>
              <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
              <input type="text" name="nome" value="<?php echo $row_usuario['nome']; ?>" required><br><br> 
              <input type="email" name="email" value="<?php echo $row_usuario['email']; ?>" required><br><br>
              <input class="ddd" type="number" name="ddd" max="99" min="10" value="<?php echo $row_usuario['ddd']; ?>" required>
              <input class="num" type="number" name="telefone" value="<?php echo $row_usuario['telefone']; ?>" required><br><br> 
              <input class="num" type="number" name="cpf" value="<?php echo $row_usuario['cpf']; ?>" required><br><br>
             

            </div>
        </div>

        <div class="botao">
            <button type="submit" name="editar">Editar</button><br>
        </div>

    </form>
    

</body>

</html>