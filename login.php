<?php

 require "config.php";

 
    if ($_POST) {
        $nome = $_POST["nome"] ?? NULL;
        $ra = $_POST["ra"] ?? NULL;
        $submit = $_POST["submit"] ?? NULL;

        $sql = "select nome, ra,
            from aluno where nome = '$nome' AND ra = '$ra';
        ";

        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":nome", $nome,);
        $consulta->bindParam(":ra", $ra,);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

        //bill
        //gates
        if (!isset($dados->nome)) {
            mensagemErro("Usuário não encontrado ou inativo.");
        } else if (!password_verify($ra, $dados->ra)) {
            mensagemErro("ra incorreto.");
        }

        $_SESSION["aluno"] = array(
            "id" => $dados->id,
            "nome" => $dados->nome,
            "login" => $dados->login
        );

       
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Biblioteca-Aluno</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/unialfalogo.png">
    <link rel="stylesheet" href="style.css">
</head>

<body class="body_login">
    <div class="background_login">
        <div class="container">
            <div class="col-md-8 offset-2">
                <div class="form_login">
                    <h1 class="title_login">Login</h1>
                    <h4 class="title_login_dois"> Identifique-se para prosseguir</h4>
                    <form action="validacao.php" method="POST">
                        <div class="row">
                            <form method="POST">
                                <input type="text" name="ra" id="ra" class="input_login" required 
                                    placeholder="Insira o seu RA">
                                <input type="text" name="nome" id="nome" class="input_login" required 
                                    placeholder="Insira o seu nome">
                                <button type="submit" name="submit" id="submit"  class="btn_login">
                                    Efetuar login
                                </button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</html>