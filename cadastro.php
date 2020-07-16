<?php
session_start();
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
    <h1>Cadastrar Usuário</h1>

    <form action="index.php" method="POST">
     <button type="submit" onclick="listar.php">Voltar</button>
    </form><br>

    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    };
    function listar(){
        header("Location: listar.php");
    }
    ?>

    <form name="form_user" action="processa_cadastro.php" method="POST">
        <div class="wrapper">
            <div>
              <label>Nome:</label><br><br>
              <label>E-mail:</label><br><br>  
              <label>DDD:</label> 
              <label>Telefone:</label><br><br> 
              <label>CPF:</label><br><br> 
            </div>
            <div>
              <input type="text" name="nome" required><br><br> 
              <input type="email" name="email" required><br><br>
              <input class="ddd" type="number" name="ddd" max="99" min="10" required>
              <input class="num" type="number" name="telefone" required><br><br> 
              <input class="num" type="number" name="cpf" required><br><br>
             

            </div>
        </div>

        <div class="botao">
            <button type="submit" name="cadastrar">Cadastrar</button><br>
        </div>

    </form>
    

</body>

</html>