<?php
      require_once("conecta.php");

    

     function listaCategorias($conexao){
      $sql = "select
      id,
      nome,
      descricao
  from
      categorias";
      
  return $resultado = mysqli_query($conexao,$sql);
     }
  
  function insereCategoria($conexao, $nome, $descricao){
          
          $query = "insert into categorias (nome, descricao) values 
          ('{$nome}', '{$descricao}')";
          
          
          return mysqli_query($conexao, $query);
  
        }
     
  function alteraCategoria($conexao, $id, $nome, $descricao){
         $query = "update categorias set nome = '{$nome}',  descricao = '{$descricao}' where id = '{$id}'";
         return mysqli_query($conexao, $query);
  }
  
  
   function buscaCategoria($conexao, $id){
       $query = "select * from categorias where id = {$id}";
       $resultado = mysqli_query($conexao, $query);
       return mysqli_fetch_assoc($resultado);
   }
  
  function removeCategoria($conexao, $id){
    $query = "delete from categorias where id = {$id}";
    return mysqli_query($conexao, $query);
  
  }

  function  buscaCategoriaNome($conexao, $nome){
    $query = "select nome from categorias where nome = '{$nome}'";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function listagemCategoria($conexao, $id){
  $query = "select id,nome,descricao from categorias where id = '{$id}'";
 
 return $resultado = mysqli_query($conexao, $query);
 
}

function leftJoinTopicos($conexao){
  $query = "SELECT
			c.id,
			c.nome,
			c.descricao,
			COUNT(t.id) AS t
		FROM
			categorias
		LEFT JOIN
			topicos
		ON
			t.id = c.id
		GROUP BY
			c.nome, c.descricao, c.id";

$resultado = mysqli_query($conexao, $query);
}


?>