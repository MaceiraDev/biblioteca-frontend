<?php
require "config.php";
if (isset($_SESSION['iduser']) && !empty($_SESSION['iduser'])):?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<body>
  <nav class="sidebar">
    <a href="teste.php"><img class="logo" src="./imagens/logoUnialfa.png"></a>
    <div class="menu-content">
      <ul class="menu-items">
        <li class="item">
          <a href=" teste.php">Home</a>
        </li>
        <li class="item">
          <a href="listar/aluno.php">Perfil</a>
        </li>
        <li class="item">
          <a href="listar/livros.php"> Livros</a>
        </li>
        <li class="item">
          <a href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <nav class="navbar">
    <h3>BEM VINDO A BIBLIOTECA UNIALFA</h3>
  </nav>
  <main class="main"> <img class="img_book" src="./imagens/openBook.png">
  </main>
</body>
</html>
<?php else: header("Location: login.php"); endif;?>

<style>
  /* Import Google font - Poppins */
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  .sidebar {
    position: fixed;
    height: 100%;
    width: 260px;
    background: #11101d;
    padding: 15px;
    z-index: 99;
    background: linear-gradient(#0064af, #ff7f00);
  }

  .logo {
    width: 100%;
  }

  .sidebar a {
    color: #fff;
    text-decoration: none;
  }

  .menu-content {
    position: relative;
    height: 100%;
    width: 100%;
    margin-top: 40px;
    overflow-y: scroll;
  }

  .menu-content::-webkit-scrollbar {
    display: none;
  }

  .menu-items {
    height: 100%;
    width: 100%;
    list-style: none;
    transition: all 0.4s ease;
  }

  .submenu-active .menu-items {
    transform: translateX(-56%);
  }

  .menu-title {
    color: #fff;
    font-size: 14px;
    padding: 15px 20px;
  }

  .item a,
  .submenu-item {
    padding: 16px;
    display: inline-block;
    width: 100%;
    border-radius: 12px;
  }

  .item i {
    font-size: 12px;
  }

  .item a:hover,
  .submenu-item:hover,
  .submenu .menu-title:hover {
    background: rgba(255, 255, 255, 0.1);
  }

  .submenu-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #fff;
    cursor: pointer;
  }

  .submenu {
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    right: calc(-100% - 26px);
    height: calc(100% + 100vh);
    background: #11101d;
    display: none;
  }

  .show-submenu~.submenu {
    display: block;
  }

  .submenu .menu-title {
    border-radius: 12px;
    cursor: pointer;
  }

  .submenu .menu-title i {
    margin-right: 10px;
  }

  .navbar,
  .main {
    left: 260px;
    width: calc(100% - 260px);
    transition: all 0.5s ease;
    z-index: 1000;
  }

  .sidebar.close~.navbar,
  .sidebar.close~.main {
    left: 0;
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

  .main {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    z-index: 100;
    background: #e7f2fd;
  }
  .main h1 {
    color: #11101d;
    font-size: 40px;
    text-align: center;
  }
  .img_book{
    width: 40%;
    filter: sepia(100%);
  }
</style>