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

    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    };
    ?>

    <form name="form_user" action="processar.php" method="POST">
        <div class="wrapper">
            <div>
              <label>Nome:</label><br><br>
              <label>E-mail:</label><br><br>  
              <label>DDD:</label> 
              <label>Telefone:</label><br><br> 
              <label>CPF:</label><br><br> 
            </div>
            <div>
              <input type="text" name="nome"><br><br> 
              <input type="email" name="email"><br><br>
              <input class="ddd" type="number" name="ddd" max="99" min="10">
              <input class="num" type="number" name="telefone"><br><br> 
              <input class="num" type="number" name="cpf"><br><br>
             

            </div>
        </div>

        <div class="botao">
            <button type="submit" name="cadastrar">Cadastrar</button>
            
        </div>

    </form>

</body>

</html>