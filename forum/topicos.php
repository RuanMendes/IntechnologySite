<?php require_once("conecta.php");
require_once("cabecalho.php");
        require_once("banco-categoria.php");
        require_once("banco-postagem.php");
        require_once("banco-topico.php");
        require_once("logica-usuario.php");
        $id = $_GET['id'];
        

?>

<h1>Assunto </h1>
<div class="table-responsive">
<?php 

$resultado = listaTopico($conexao, $id);

while($coluna = mysqli_fetch_assoc($resultado)){

    echo '<table class="table table-striped table-bordered col-lg-12">
    <thead>
    <tr>
        <th colspan="2" scope="col"><h2 class="text-center">' . $coluna['assunto'] . '</h2></th>
    </tr></thead>';




$post_resultado = listaPost($conexao,$id);
while($post_coluna = mysqli_fetch_assoc($post_resultado))
				{
                    echo '
                    <tbody>
                    <tr>
							<td>' . $post_coluna['apelido'] . '<br/>' . date('d-m-Y H:i', strtotime($post_coluna['data'])) . '</td>
							<td>' . htmlentities(stripslashes($post_coluna['conteudo'])) . '</td>
						  </tr></tbody>';
                }
                
         

           

            if(!usuarioEstaLogado())
			{
				echo '<tr><td colspan=2>Você precisa estar <a href="tela-login.php">logado</a> para responder. Caso não tenha uma conta, <a href="cadastro-usuario-formulario.php">cadastre-se</a>.';
			}
			else
			{
                echo '
                <form method="post" action="adiciona-resposta.php?id=' . $coluna['id'] . '">
                        <div class="container" style="width: 300px;">
                        <tr id="no-hover"><td colspan="2" ><h2 style="color: var(--green);">Resposta:</h2><br/>

 

  <div class="form-group">
    <textarea type="text" class="form-control" rows="5" name="resposta_conteudo"></textarea>
  </div>

            <button type="submit" class="btn btn-block btn-outline-success">Enviar</button>
					</form></td></tr>  
                    </div>
                               ';
            }
            
        }

            echo'</table>';
        
?>

</div>









<?php require_once("rodape.php"); ?>