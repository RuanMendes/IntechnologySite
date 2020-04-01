<?php require_once("conecta.php");
require_once("cabecalho.php");
        require_once("banco-categoria.php");
        require_once("banco-topico.php");
        require_once("logica-usuario.php");
        $id = $_GET['id'];

?>
<div class="table-responsive">
<table class="table table-striped table-bordered col-lg-12">
<thead>
					  <tr>
						<th scope="col"><h2>Tópico</h2></th>
						<th scope="col"><h2>Criado em</h2></th>
                      </tr>
                      </thead>
                      <tbody>
<?php

$resultado = listagemCategoria($conexao,$id);
while($coluna = mysqli_fetch_assoc($resultado))
		{   
            echo '<h1>Tópicos na categoria "' . $coluna['nome'] . '"</h1>';
        }
        
      
        $resultado = listagemTopico($conexao,$id);
                
					
				while($coluna = mysqli_fetch_assoc($resultado))
				{				
					echo '<tr>';
						echo '<td>';
							echo '<h3><a  href="topicos.php?id=' . $coluna['id'] . '">' . $coluna['assunto'] . '</a><br /><h3>';
						echo '</td>';
						echo '<td>';
							echo date('d-m-Y', strtotime($coluna['data']));
						echo '</td>';
                    echo '</tr>';
                
				}

?>
</tbody>
</table>
</div>
<?php require_once("rodape.php"); ?>