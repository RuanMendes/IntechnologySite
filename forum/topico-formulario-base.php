<?php
require_once("conecta.php");

?>

<div class="jumbotron offset-lg-2 offset-md-1 col-sm-auto col-lg-8 col-md-auto rounded">
<h5 class="text-center p-3 mb-5">Crie um tópico em nosso fórum e comece a interagir com outras pessoas!</h5>
    <div class="container-sm" >

        <form>
        <div class="form-group">
    <label>Nome do tópico</label>
    <input type="text" class="form-control" placeholder="Insira o nome do tópico" name="assunto">
  </div>
  <div class="form-group">
    <label>Categoria</label>
<?php
              echo '<select class="custom-select" name="categoria_topico">';
              echo '  <option selected> Selecione uma categoria</option>
              ';
              while($coluna = mysqli_fetch_assoc($resultado))
              {
                  echo '<option value="' . $coluna['id'] . '">' . $coluna['nome'] . '</option>';
              }
          echo '</select>'; 
?>
</div>


  <div class="form-group">
    <label>Mensagem</label>
    <textarea type="text" class="form-control" rows="5" name="conteudo"></textarea>
  </div>

        
            <button type="submit" class="btn btn-block btn-outline-success">Criar</button>


        </form>

    </div>
</div>