<?php 
require_once("cabecalho.php");
      require_once("conecta.php");
      require_once("banco-usuario.php");

      $nome = $_POST['nome'];
      $sobrenome = $_POST['sobrenome'];
      $email = $_POST['email'];
      $apelido = $_POST["apelido"];
      $senha = $_POST['senha'];

      $erros = array();
      if (empty($email && $senha && $nome && $sobrenome && $apelido)) { 

       
              $erros[] = 'Alguns campos ficaram vazios, tente novamente!';

      }

     
        if(!empty($_POST["apelido"]))
      { 

            if (buscaApelido($conexao,$apelido)) {
                $erros[] = 'Já existe um usuário com este apelido.';
            }
          if(!ctype_alnum($_POST["apelido"]))
          {
              $erros[] = 'O apelido só pode conter letras e dígitos.';
          }
          if(strlen($_POST["apelido"]) > 15)
          {
              $erros[] = 'O apelido não pode conter mais de 30 caractéres.';
          }
      }
      else
      {
          $erros[] = 'O apelido não pode ficar vazio.';
      }
      if(!empty($_POST['nome']))
      { 
        
          if(strlen($_POST['nome']) > 50)
          {
              $erros[] = 'O nome não pode conter mais de 50 caractéres.';
          }
      }
      else
      {
          $erros[] = 'O nome não pode ficar vazio.';
      }
    

      if(!empty($_POST['senha']))
      {
          if($_POST['senha'] != $_POST['senha_check'])
          {
              $erros[] = 'As senhas não bateram.';
          }
          
      }
      else
      {
          $erros[] = 'A senha não pode ficar vazia.';
      }

      
      if(!empty($_POST['email']))
      { 
       if (buscaEmail($conexao,$email)) {
        $erros[] = 'O email já existe';
       }
          if(strlen($_POST['email']) > 50)
          {
              $erros[] = 'O email não pode conter mais de 70 caractéres.';
          }
      }
      else
      {
          $erros[] = 'O email não pode ficar vazio.';
      }
       
      if(!empty($erros)) 
      {
          
  
          echo '<div class="jumbotron offset-lg-2 offset-md-1 col-sm-auto col-lg-8 col-md-auto">
          <h4>Uh-oh.. alguns campos não foram preenchidos corretamente..</h4>
          <ul>';
          foreach($erros as $key => $value) 
          {
              echo '<li>' . $value . '</li>';
          }
          echo '

          <hr class="solid">  

          <a  href="cadastro-usuario-formulario.php"><button class="btn btn-outline-success btn-lg">Voltar para tela de cadastro.</button></a>

          </ul></div>';


      }
      else
      {
        insereUsuario($conexao,$nome, $sobrenome, $email, $apelido, $senha);
        

          
              echo '
              <div class="jumbotron offset-lg-2 offset-md-1 col-sm-auto col-lg-8 col-md-auto">
              <h4>Cadastro finalizado com sucesso!</h4>
              <hr class="solid">
              <a  href="tela-login.php"><button class="btn btn-outline-success btn-lg">Logar-se</button></a>


              </div>
              
              
              
              
              
              ';

              ;
          
      }
  
      require_once("rodape.php")



?>


    

     


  