<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Cadastrar Depoimentos</h2>
 
    <form method="post" enctype="multipart/form-data">

        <?php 
        
            if(isset($_POST['acao'])){
                
                if(Painel::insert($_POST)){
                    Painel::alert('sucesso','Cadastro do depoimento foi realizado com sucesso');
                }else{
                    Painel::alert('erro','Campos vazios não são permitidos');
                }
                
            }  
        ?>

        <div class="form-group">
            <label>Nome Pessoa:</label>
            <input type="text" name="nome">
        </div><!--form-group-->
        <div class="form-group">
            <label>Depoimento:</label>
            <textarea class="tinymce" name="depoimento"></textarea>
        </div><!--form-group--><div class="form-group">
            <label>Data:</label>
            <input formato="data" type="text" name="data"></input>
        </div><!--form-group-->
        <div class="form-group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="nome_tabela" value="tb_site.depoimentos">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    </form>

</div><!--box-content-->

