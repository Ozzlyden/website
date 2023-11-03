<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $slide = Painel::select('tb_site.slides', 'id = ?', array($id));
    }else{
        Painel::alert('erro', 'Voce precisa passar o parametro ID');
        die();
    }
?>

<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Editar Slide</h2>

    <form method="post" enctype="multipart/form-data">
        <?php 
            // Enviar fomulario
            if(isset($_POST['acao'])){

                $nome = $_POST['nome'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem_atual'];

                if($imagem['name'] != ''){
                    // Upload de img
                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        $arr = ['nome'=>$nome,'img'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slides'];
                        Painel::update($arr);
                        $slide = Painel::select('tb_site.slides', 'id = ?', array($id));
                        Painel::alert('sucesso',' Slide e Imagem editado com sucesso');
                    }else{
                        Painel::alert('erro','O formato da imagem não e valido');
                    }
                }else{
                    $imagem = $imagem_atual;
                    $arr = ['nome'=>$nome,'img'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slides'];
                    Painel::update($arr);
                    $slide = Painel::select('tb_site.slides', 'id = ?', array($id));
                    Painel::alert('sucesso',' Slide editado com sucesso');
                }
            }
        ?>

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $slide['nome']; ?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem" >
            <input type="hidden" name="imagem_atual" value="<?php echo $slide['img']; ?>">
            <p>Formatos aceitos: jpg,png e jpeg</p>
            <p>Tamanho: 520x520</p>
        </div><!--form-group-->
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    </form>

</div><!--box-content-->

