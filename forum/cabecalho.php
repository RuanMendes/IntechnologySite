<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Fórum</title>


</head>
<body>

  
<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"><img src="img/logo.svg" class="img-fluid" id="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="topico-formulario.php">Criar um tópico</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="categoria-formulario.php">Criar uma categoria</a>
      </li>
      </ul>

      <?php
       require_once("logica-usuario.php");
       
       if (usuarioEstaLogado()) { ?>

<div class="dropdown nav navbar-nav ml-auto">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Bem-vindo de volta <?=usuarioLogado()?>  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="logout.php"> Não é você ? Deslogue-se</a>

  </div>
</div>


 <?php } else { ?>
     <ul class="nav navbar-nav ml-auto">  
      <li class="nav-item">
        <a class="nav-link " href="tela-login.php">Logar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cadastro-usuario-formulario.php">Não tem uma conta? Cadastre-se</a>
      </li>
      </ul>
 <?php } ?> 
    
  </div>
</nav>



<div class="background-divisor"></div>






<div class="container">
<div class="main">
