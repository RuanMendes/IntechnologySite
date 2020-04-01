<?php
require_once("conecta.php");

    function buscaUsuario($conexao, $email, $senha){
    	       $senhaMd5 = md5($senha);
               $query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
               $resultado = mysqli_query($conexao, $query);
               $usuario = mysqli_fetch_assoc($resultado);
               return $usuario;
    }

    function insereUsuario($conexao, $nome, $sobrenome, $email, $apelido, $senha){
    	$senhaMd5 = md5($senha);
    	$query = "insert into usuarios (nome, sobrenome, email , apelido ,senha,data,nivel) values ('{$nome}', '{$sobrenome}' ,'{$email}', '{$apelido}' ,'{$senhaMd5}', Now() , 0)";


        return mysqli_query($conexao, $query);

    }


function buscaEmail($conexao, $email){
               $query = "select * from usuarios where email='{$email}'";
               $resultado = mysqli_query($conexao, $query);
               $usuario = mysqli_fetch_assoc($resultado);
               return $usuario;
    }

    function buscaApelido($conexao, $apelido){
      $query = "select * from usuarios where apelido='{$apelido}'";
      $resultado = mysqli_query($conexao, $query);
      $usuario = mysqli_fetch_assoc($resultado);
      return $usuario;
}