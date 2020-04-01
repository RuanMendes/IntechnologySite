<?php
      require_once("conecta.php");
      require_once("logica-usuario.php");
    


function insereTopico($conexao,$assunto,$categoria_topico){
    $query = "insert into topicos (assunto,data,categoria_id, usuario_id)
    values ('{$assunto}', Now(), '{$categoria_topico}' , '{$_SESSION['usuario_id']}' )";
  
 return $resultado = mysqli_query($conexao,$query);
  
}

function listagemTopico($conexao, $id){
    $query = "select id,assunto,data,categoria_id from topicos where categoria_id = '{$id}'";
 
    return $resultado = mysqli_query($conexao, $query);
  

}

function listaTopico($conexao,$id){

            
            $query = "select id,assunto from topicos where topicos.id = '{$id}'";
			
return $resultado = mysqli_query($conexao,$query);


}

function pegaUltimoTopico($conexao, $coluna){

    $topicosql = "SELECT
									id,
									assunto,
									data,
									categoria_id
								FROM
									topicos
								WHERE
                                categoria_id = " . $coluna['id'] . "
								ORDER BY
									data
								DESC
								LIMIT
									1";
								
				return	$topicoresultado = mysqli_query($conexao, $topicosql);

}
