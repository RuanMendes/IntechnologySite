<?php
      require_once("conecta.php");
      require_once("logica-usuario.php");
      require_once("banco-topico.php");
      
    
                 

function inserePost($conexao, $conteudo){
   
      $query = "insert into postagens(conteudo,data,topico_id,usuario_id)
      values ('{$conteudo}', Now() , LAST_INSERT_ID() , '{$_SESSION['usuario_id']}')";
    return  $resultado = mysqli_query($conexao,$query);

}

function listaPost($conexao,$id){
                                    $post_query = "select postagens.topico_id, postagens.conteudo, postagens.data , postagens.usuario_id, usuarios.id, usuarios.apelido from postagens left join usuarios on postagens.usuario_id = usuarios.id where postagens.topico_id = '{$id}'";


		return	$post_resultado = mysqli_query($conexao, $post_query);

}

function insereResposta($conexao, $resposta_conteudo , $topico_id){
   
      $query = "insert into postagens (conteudo,data,topico_id,usuario_id) values ('{$resposta_conteudo}', Now() , '{$topico_id}' , '{$_SESSION['usuario_id']}')";
    return  $resultado = mysqli_query($conexao,$query);

}
