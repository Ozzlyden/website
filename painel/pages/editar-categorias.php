<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $categorias = Painel::select('tb_site.categorias','id=?',array($id));
    }else{
        Painel::alert('erro','Voce precisa passar o parametro ID');
        die();
    }
?>

<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Editar Categorias</h2>
 
    <form method="post" enctype="multipart/form-data">

        <?php 
            // Atualizar categorias
            if(isset($_POST['acao'])){
                $slug = Painel::generateSlug($_POST['nome']);
                $arr = array_merge($_POST,array('slug'=>$slug));
                $verifica = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ? AND id != ?");
                $verifica->execute(array($_POST['nome'],$id));

                if($verifica->rowCount() == 1){
                    Painel::alert("erro","Ja existe uma categoria com o mesmo nome");
                }else{
                    if(Painel::update($arr)){
                        Painel::alert('sucesso','Categoria editada com sucesso');  
                        $categorias = Painel::select('tb_site.categorias','id=?',array($id));
                    }else{
                        Painel::alert('erro', 'Campos vazios nao sao permitidos');
                    }
                }
            }  
        ?>

        <div class="form-group">
            <label>Categoria:</label>
            <input type="text" name="nome" value="<?php echo $categorias['nome']; ?>">
        </div><!--form-group-->
           
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nome_tabela" value="tb_site.categorias">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    </form>

</div><!--box-content-->

