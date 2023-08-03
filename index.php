<?php

 require "./config.php";

if ($_POST) {
    $ra = $_POST["ra"] ?? NULL;
    $nome = $_POST["nome"] ?? NULL;

    $sql = "select ra, nome, from aluno";

    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":nome", $nome, PDO::PARAM_STR);
    $consulta->bindParam(":ra", $ra, PDO::PARAM_INT);
    $consulta->execute();

    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    if (!isset($dados->id)) {
        mensagemErro("Aluno não encontrado");
    } else if (!password_verify($senha, $dados->$ra)) {
        mensagemErro("ra incorreto");
    }

    $_SESSION["aluno"] = array(
        "ra" => $dados->ra,
        "nome" => $dados->nome,
    );
   
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>  

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>