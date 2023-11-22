<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $noticias = Painel::select('tb_site.noticias', 'id = ?', array($id));
    }else{
        Painel::alert('erro', 'Voce precisa passar o parametro ID');
        die();
    }
?>

<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Editar Notícia</h2>

    <form method="post" enctype="multipart/form-data">
        <?php 
            // Enviar fomulario
            if(isset($_POST['acao'])){

                $titulo = $_POST['titulo'];
                $conteudo = $_POST['conteudo'];
                $imagem = $_FILES['capa'];
                $imagem_atual = $_POST['imagem_atual'];
                $verifica = MySql::conectar()->prepare("SELECT `id` FROM `tb_site.noticias` WHERE titulo = ? AND categoria = ? AND id != ?");
                $verifica->execute(array($titulo,$_POST['categoria_id'],$id));

                if($verifica->rowCount() == 0){
                if($imagem['name'] != ''){
                    // Upload de img
                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        $slug = Painel::generateSlug($titulo);
                        $arr = ['titulo'=>$titulo,'categoria_id'=>$_POST['categoria_id'], 'conteudo'=>$conteudo, 'capa'=>$imagem, 'slug'=>$slug,'id'=>$id,'nome_tabela'=>'tb_site.noticias'];
                        Painel::update($arr);
                        $noticias = Painel::select('tb_site.noticias', 'id = ?', array($id));
                        Painel::alert('sucesso',' Notícia editada com sucesso');
                    }else{
                        Painel::alert('erro','O formato da imagem não e valido');
                    }
                }else{
                    $imagem = $imagem_atual;
                    $slug = Painel::generateSlug($titulo);
                    $arr = ['titulo'=>$titulo, 'categoria_id'=>$_POST['categoria_id'] , 'conteudo'=>$conteudo, 'capa'=>$imagem, 'slug'=>$slug,'id'=>$id,'nome_tabela'=>'tb_site.noticias'];
                    Painel::update($arr);
                    $noticias = Painel::select('tb_site.noticias', 'id = ?', array($id));
                    Painel::alert('sucesso',' Noticia editada com sucesso');
                }
                }else{
                    Painel::alert('erro', 'Ja existe uma noticia com esse nome');

                }
            }
        ?>

        <div class="form-group">
            <label>Titulo:</label>
            <input type="text" name="titulo" required value="<?php echo $noticias['titulo']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Conteudo:</label>
            <textarea name="conteudo"><?php echo $noticias['conteudo']?></textarea>
        </div><!--form-group-->

        <div class="form-group">
		<label>Categoria:</label>
			<select name="categoria_id">
				<?php
					$categorias = Painel::selectAll('tb_site.categorias');
					foreach ($categorias as $key => $value) {
				?>
				<option <?php if($value['id'] == @$noticias['categoria_id']) echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['nome']; ?></option>
				<?php } ?>
			</select>
		</div><!--form-group-->

        <div class="form-group">
            <label>Imagem de capa:</label>
            <input type="file" name="capa" >
            <input type="hidden" name="imagem_atual" value="<?php echo $noticias['capa']; ?>">
        </div><!--form-group-->
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    </form>

</div><!--box-content-->

