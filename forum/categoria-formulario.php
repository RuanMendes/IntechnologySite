<?php require_once("cabecalho.php");
      require_once("logica-usuario.php");  
?>




<form action="adiciona-categoria.php" method="post">

<?php  
if(usuarioEstaLogado() == null){
    
echo'
<div class="jumbotron offset-lg-2 offset-md-1 col-sm-auto col-lg-8 col-md-auto">
<h3>Você precisa estar logado para criar uma categoria em nosso fórum!</h3>
<ul>
<li>
<a href="tela-login.php">Clique aqui para se logar</a>
<br>
ou
</li>
<li>
<a href="cadastro-usuario-formulario.php">Caso não tenho uma conta, clique aqui para se registrar </a>
</li>

</ul>
</div>

' ;




}else if($_SESSION['nivel'] != 1 ){
      
            //the user is not an admin
            echo '<div class="jumbotron offset-lg-2 offset-md-1 col-sm-auto col-lg-8 col-md-auto">
            <h3>Você não é Administrador em nosso fórum, portanto não pode criar categorias!</h3>
            <ul>
            <li>Caso não tenha uma categoria que lhe agrade, fale com um Administrador para ele poder criar. </li>
      <li>Se o fórum não possui categoria, aguarde um Administrador criar. </li>
      <hr class="solid">
      <a href="index.php">Clique aqui para voltar a home </a>
            
            
            
            </ul></div>.';
      } else{

require_once("categoria-formulario-base.php");}?>

</form>








<?php require_once("rodape.php") ?>