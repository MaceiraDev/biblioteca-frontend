<?php
if (isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['ra']) && !empty($_POST['ra'])) {

  require 'config.php';
  require 'Aluno.class.php';
  $u = new Aluno();

  // "addslashes" segurança evita a manipulação dos dados
  $nome = addslashes($_POST['nome']);
  $ra = addslashes($_POST['ra']);

  if ($u->login($ra, $nome) == true) {
    if (isset($_SESSION['iduser'])) {
      header("Location: teste.php");
      exit;
    }
    header("Location: paginas/erro.php");
  }
}
header("Location: paginas/erro.php");