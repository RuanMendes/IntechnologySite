<?php require_once("conecta.php");
    require_once("logica-usuario.php");
    require_once("banco-postagem.php");
    require_once("cabecalho.php");
    $resposta_conteudo = $_POST['resposta_conteudo'];
    $topico_id = $_GET['id'];
    $msg = array();
  

    if (empty($resposta_conteudo)) {
  
        $msg[] = 'A mensagem não pode ficar vazia! <br>
        <a href="topicos.php?id=' . htmlentities($_GET['id']) . '">  Clique aqui para voltar ao tópico</a>.';
  
      }else{

    $resultado = insereResposta($conexao, $resposta_conteudo, $topico_id);

    if(!$resultado)
		{
			$msg[] = 'Sua resposta não foi salva, tente outra hora';
		}
		else
		{
			$msg[] = 'Sua resposta foi salva, dê uma olhada <a href="topicos.php?id=' . htmlentities($_GET['id']) . '">no tópico</a>.';
		}


      }

      if(!empty($msg)) 
{
    
    require_once("cabecalho.php");
    echo '
    <div class="container text-left">
    <div class="jumbotron offset-lg-2 offset-md-1 col-sm-auto col-lg-8 col-md-auto">
    <ul>';
    foreach($msg as $key => $value) 
    {
        echo '<li>' . $value . '</li>';
    }
    echo '

    <hr class="solid">  

    <a href="index.php">Clique aqui e volte para home. </a>

    </ul></div></div>';
    require_once("rodape.php");

}


      require_once("rodape.php");