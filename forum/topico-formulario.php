<?php require_once("cabecalho.php");
    require_once("banco-categoria.php");
    require_once("conecta.php");
    require_once("logica-usuario.php");
    $resultado = listaCategorias($conexao);
?>



<form action="adiciona-topico.php" method="post">
<?php 

if(mysqli_num_rows($resultado) == 0){

 if( $_SESSION['nivel'] == 1){
 
    echo '
    <div class="container text-center">
    <div class="jumbotron offset-lg-2 offset-md-1 col-sm-auto col-lg-8 col-md-auto" >
    <h4>Você ainda não criou categorias, Administrador</h4>
    <hr class=solid>
    <a href="categoria-formulario.php">Clique aqui para publicar uma categoria </a>
    ';
    
 } else {
     echo 'Antes de publicar um tópico, espere por um Administrador postar uma categoria';
 }


} else{ 

    require_once("topico-formulario-base.php");
    

 } ?>

</form>


<?php require_once("rodape.php") ?>