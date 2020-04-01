<?php require_once("cabecalho.php");
require_once("banco-topico.php");
    require_once("conecta.php");
    require_once("logica-usuario.php");
    require_once("banco-postagem.php");
    $assunto = $_POST['assunto'];
    $categoria_topico = $_POST['categoria_topico'];
    $conteudo = $_POST['conteudo'];
    $erros = array();
    


    
  if (usuarioEstaLogado() == null) {
      $erros[] = 'Desculpe mas você precisa estar logado para criar um tópico<br>
      <a  href="tela-login.php"><button class="btn btn-outline-success btn-lg" style="padding:4px; margin: 5px auto;">Logar-se</button></a>';

    }

     else if (empty($assunto && $conteudo && $categoria_topico)) {
  
      $erros[] = 'Os campos não podem ficar vazios!';

    }


     if(!empty($erros)) 
    {
        

        echo '
        <div class="container text-left">
        <div class="jumbotron offset-lg-2 offset-md-1 col-sm-auto col-lg-8 col-md-auto">
        <h4>Uh-oh.. alguns campos não foram preenchidos corretamente..</h4>
        <ul>';
        foreach($erros as $key => $value) 
        {
            echo '<li>' . $value . '</li>';
        }
        echo '
    
        <hr class="solid">  
    
        <a href="topico-formulario.php">Clique aqui e volte para criação de tópico. </a>
    
        </ul></div></div>';
   
    
    }else{


    insereTopico($conexao, $assunto, $categoria_topico);
    inserePost($conexao, $conteudo);

    echo'
    <div class="container text-left">
        <div class="jumbotron offset-lg-2 offset-md-1 col-sm-auto col-lg-8 col-md-auto">
        <h4>Seu tópico foi adicionado com sucesso!</h4>
        <hr class="solid">
        <a  href="index.php"><button class="btn btn-outline-success btn-lg">Fechar</button></a>


        </div> </div>
    
    
    ';


    }


    ?>

  

    <?php require_once("rodape.php") ?>