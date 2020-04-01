<?php
  require_once("logica-usuario.php");
  require_once("banco-usuario.php");
  $_SESSION['nivel']  = 0;
  $erros = array();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
</head>
<body id="tela-login">
    
    <header class="border border-success" style="height: 15px;">
    </header>
    <div class="container" style="margin: 30px auto;">
        <div class="row offset-lg-3">
            <div class="card text-center">
                <div class="card-header">
                    <h2 class="text-success"> Conta InTechnology </h2>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <h5 class="justify-content-around">Entre com uma conta para você começar a interagir no nosso fórum ! </h5>
                        Não possui uma conta ainda? <a href="cadastro-usuario-formulario.php">Clique aqui para se cadastrar</a>
                        <?php if ($_SERVER['REQUEST_METHOD'] != 'POST') { ?>
                        
                        <form action="" method="post">
                            <div class="row text-left">
                                <div class="form-group col col-sm">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Insira seu email"
                                        name="email">
                                </div>
                            </div>
                            <div class="row text-left">
                                <div class="form-group col col-sm">
                                    <label>Senha</label>
                                    <input type="password" class="form-control" placeholder="Insira sua senha" name="senha">
                                </div>
                            </div>
                            <hr class="solid">
                            <button type="submit" class="btn btn-outline-success btn-lg" name="action">Entrar </button>
                        </form>
                            <?php } else {
                        

                                     if(empty($_POST['email']))
              {
                  $erros[] = 'O campo do email não pode ficar vazio.';
              }
               
              if(empty($_POST['senha']))
              {
                  $erros[] = 'A senha não pode ficar vazia.';
              } 
             
              $usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);

 

              if($usuario == null){
                  
                  $erros[] = "Usuário ou senha inválido!";

              
              }
              if(!empty($erros))
              {
                  echo '<div class="alert text-left" role="alert">
                  <h4>Uh-oh.. alguns campos não foram preenchidos corretamente..</h4>
                  <ul>';
                  foreach($erros as $key => $value)
                  {
                      echo '<li>' . $value . '</li>';
                  }
                  echo '
                  <hr class="solid">  

                  <a  href="tela-login.php"><button class="btn btn-outline-success btn-lg">Voltar para tela de login</button></a>
                  </ul></div>';
                 
              } 
              
              
              else{
              
                  $_SESSION["success"] = "Usuário logado com sucesso";
                  logaUsuario($usuario["apelido"]);
                  header("Location: index.php");
                  $sql = "SELECT 
                        id,
                        email,
                        nivel
                    FROM
                        usuarios
                    WHERE
                        email = '" . $_POST['email'] . "'
                    AND
                        senha = '" . md5($_POST['senha']) . "'";
                         
            $resultado = mysqli_query($conexao,$sql);

                     
                    while($coluna = mysqli_fetch_assoc($resultado))
                    {
                        $_SESSION['usuario_id'] = $coluna['id'];
                        $_SESSION['email']  = $coluna['email'];
                        $_SESSION['nivel'] = $coluna['nivel'];
                    }
            
              
              }
            
             
           
              }?>
        </p>
                </div>
                <div class="card-footer text-muted">
                </div>
            </div>
           
        </div>
    </div>
</body>

</html>