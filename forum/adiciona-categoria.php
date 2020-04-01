<?php
require_once("cabecalho.php");

      require_once("conecta.php");
      require_once("banco-categoria.php");

      $nome = $_POST['nome'];
      $descricao = $_POST['descricao'];
      $erros = array();
      $resultado = listaCategorias($conexao);


if (empty($nome || $descricao)) {
        $erros[] = 'O nome e/ou descrição não podem estar vazios.';
    }

    

if (!empty($descricao) || !empty($categoria)) {
    if (strlen($_POST['descricao']) > 90) {
        $erros[] = 'A descrição não pode conter mais de 90 caractéres.';
    }

    if (buscaCategoriaNome($conexao, $_POST['nome']) ) {

        $erros[] = 'Já existe uma categoria com este nome.';
    }

    
} 

if(mysqli_num_rows($resultado) > 7 ){

    $erros[] = 'Não pode criar mais categorias';
}
    if(!empty($erros)) {
    
    require_once("cabecalho.php");
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

    <a href="categoria-formulario.php">Clique aqui e volte para criação de categorias. </a>

    </ul></div></div>';
    require_once("rodape.php");

}




else{
echo'
    <div class="jumbotron offset-lg-2 offset-md-1 col-sm-auto col-lg-8 col-md-auto">
    <p>Categoria criada com sucesso!
    <hr class="solid">
    <a  href="index.php"><button class="btn btn-outline-success btn-lg">Fechar</button></a>
    </P
  </div>

  ';
      insereCategoria($conexao, $nome, $descricao);


}

require_once("rodape.php");