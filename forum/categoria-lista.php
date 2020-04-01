<?php
    require_once("conecta.php"); 
    require_once("banco-categoria.php");
    require_once("banco-topico.php");

   
?>

<div class="radius">
<table class="table table-striped table-hover table-bordered" id="rounded-table">

  <thead>
      <th scope="col"><h2>Categorias</h2></th>
      <th scope="col"><h2>Último Tópico</h2></th>
    </tr>
  </thead>
<tbody>
<?php

$resultado = listaCategorias($conexao);
while($coluna = mysqli_fetch_assoc($resultado))


{               
    echo '<tr>';
        echo '<td>';
        echo '<h3><a href="categorias.php?id=' . $coluna['id'] . '">' . $coluna['nome'] . '</a></h3>' . $coluna['descricao'];
        echo '</td>';
       
       $topicoresultado =  pegaUltimoTopico($conexao, $coluna);

        if(mysqli_num_rows($topicoresultado) == 0)
						{
              echo '<td>
              <p>
              Sem tópico
              </p>
              </td></tr>';
						}
						else
						{
							while($coluna = mysqli_fetch_assoc($topicoresultado))
              echo '<td>
              <a href="topicos.php?id=' . $coluna['id'] . '">' . $coluna['assunto'] . '</a> em ' . date('d-m-Y', strtotime($coluna['data']))
              ;
              echo'</td></tr>';

						}
      
}




?>
  
</tbody>
</table>
</div>