<?php 
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $depoimento = Painel::select('tb_site.depoimentos','id=?',array($id));
    }else{
        Painel::alert('erro','Voce precisa passar o parametro ID');
        die();
    }
?>

<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Editar Depoimento</h2>
 
    <form method="post" enctype="multipart/form-data">

        <?php 
        // Atualizar depoimento
            if(isset($_POST['acao'])){
                if(Painel::update($_POST)){
                    Painel::alert('sucesso','Cadastro do depoimento foi realizado com sucesso');  
                    $depoimento = Painel::select('tb_site.depoimentos','id=?',array($id));
                }else{
                    Painel::alert('erro', 'Campos vazios nao sao permitidos');
                }
            }  
        ?>

        <div class="form-group">
            <label>Nome Pessoa:</label>
            <input type="text" name="nome" value="<?php echo $depoimento['nome']; ?>">
        </div><!--form-group-->
        <div class="form-group">
            <label>Depoimento:</label>
            <textarea class="tinymce" name="depoimento"><?php echo $depoimento['depoimento']; ?></textarea>
        </div><!--form-group--><div class="form-group">
            <label>Data:</label>
            <input formato="data" type="text" name="data" value="<?php echo $depoimento['data']; ?>"></input>
        </div><!--form-group-->
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nome_tabela" value="tb_site.depoimentos">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    </form>

</div><!--box-content-->

