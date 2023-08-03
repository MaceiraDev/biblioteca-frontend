<?php
require "../config.php";
if (isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])): ?>

  <!DOCTYPE html>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="shortcut icon" href="imagens/unialfalogo.png">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
      integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
  </head>

  <body>
    <nav class="sidebar">
      <a href="/template/teste.php"><img class="logo" src="../imagens/logoUnialfa.png"></a>
      <div class="menu-content">
        <ul class="menu-items">
          <li class="item">
            <a href="/template/teste.php">Home</a>
          </li>
          <li class="item">
            <a href="aluno.php">Perfil</a>
          </li>
          <li class="item">
            <a href="livros.php"> Livros</a>
          </li>
        </ul>
      </div>
    </nav>
    <nav class="navbar">
      <h3 class="meu_perfil"> MEU PERFIL</h3>
    </nav>
    <main class="main">
      <div class="container">
        <table class="table   table-bordered table-sm">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">ra</th>
              <th scope="col">nome</th>
              <th scope="col">endereco</th>
              <th scope="col">cidade</th>
              <th scope="col">uf</th>
              <th scope="col">telefone</th>
              <th scope="col">curso</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT aluno.*, curso.nome AS nome_curso
        FROM aluno
        JOIN curso ON aluno.curso_id = curso.id;
        ";
            $consulta = $pdo->prepare($sql);
            $consulta->execute();

            if ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
              ?>
              <tr>
                <td>
                  <?= $dados->id ?>
                </td>
                <td>
                  <?= $dados->ra ?>
                </td>
                <td>
                  <?= $dados->nome ?>
                </td>
                <td>
                  <?= $dados->endereco ?>
                </td>
                <td>
                  <?= $dados->cidade ?>
                </td>
                <td>
                  <?= $dados->uf ?>
                </td>
                <td>
                  <?= $dados->telefone ?>
                </td>
                <td>
                  <?= $dados->nome_curso ?>
                </td>

              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </main>
  </body>

  </html>
<?php else:
  header("Location: ./login.php");
endif; ?>

<style>
  .sidebar {
    background: linear-gradient(#0064af, #ff7f00);
  }

  .logo {
    width: 100%;
  }

  .navbar {
    position: fixed;
    color: #fff;
    padding: 15px 20px;
    font-size: 25px;
    background: #0764aa;
    text-align: center;
  }

  .meu_perfil {
    text-align: center;
  }

  th {
    background: #ff7f00 !important;

  }

  td {
    background: #0764aa !important;
    color: #fff !important;
  }
</style>