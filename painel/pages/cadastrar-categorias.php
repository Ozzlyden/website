<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Cadastrar Categoria</h2>
 
    <form method="post" enctype="multipart/form-data">

        <?php 
            // SISTEMA DE CADASTRO
            if(isset($_POST['acao'])){
                // Paramentros
                $nome = $_POST['nome'];

                // Verificacoes
                if($nome == ''){
                    Painel::alert('erro','Campo Nome está vazio');
                }else{         
                    $slug = Painel::generateSlug($nome);
                    $arr = ['nome'=>$nome,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site.categorias'];
                    Painel::insert($arr);
                    Painel::alert('sucesso','Cadastro da Categoria realizado com sucesso');
                    
                }
            }  
        ?>

        <div class="form-group">
            <label>Nome Categoria:</label>
            <input type="text" name="nome">
        </div><!--form-group-->
        
        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    </form>

</div><!--box-content-->
