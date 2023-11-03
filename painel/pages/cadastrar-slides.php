<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Cadastrar Slides</h2>
 
    <form method="post" enctype="multipart/form-data">

        <?php 
            // SISTEMA DE CADASTRO
            if(isset($_POST['acao'])){
                // Paramentros
                $nome = $_POST['nome'];
                $imagem = $_FILES['imagem'];

                // Verificacoes
                if($nome == ''){
                    Painel::alert('erro','Campo Nome está vazio');
                }else{

                    if(Painel::imagemValida($imagem) == false){
                        Painel::alert('erro','O formato da imagem não aceito');
                    }else{
                        // Cadastro do BD
                        include('../classes/lib/WideImage.php');    // o certo seria colocar no config.php
                        $imagem = Painel::uploadFile($imagem);

                        // Redimencionamento usando a lib WideImagem
                        WideImage::load('uploads/'.$imagem)->resize(100)->saveToFile('uploads/'.$imagem);   // deixando a img em 100px e mais leve
                        
                        $arr = ['nome'=>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site.slides'];
                        Painel::insert($arr);
                        Painel::alert('sucesso','Cadastro do Slide realizado com sucesso');
                    }
                }
            }  
        ?>

        <div class="form-group">
            <label>Nome Slide:</label>
            <input type="text" name="nome">
        </div><!--form-group-->
        
        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem">
            <p>Formatos aceitos: jpg,png e jpeg</p>
            <p>Tamanho: 520x520</p>
        </div><!--form-group-->
        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    </form>

</div><!--box-content-->

