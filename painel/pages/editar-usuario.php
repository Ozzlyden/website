<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Editar Usuário</h2>

    <form method="post" enctype="multipart/form-data">
        <?php 
            // Enviar fomulario
            if(isset($_POST['acao'])){

                // Paramentros class Usuario.php
                $usuario = new Usuario();
                $nome = $_POST['nome'];
                $senha = $_POST['password'];
                $imagem = $_FILES['imagem'];
                $imagem_atual = $_POST['imagem_atual'];
                print_r($imagem);
                $usuario = new Usuario();

                if($imagem['name'] != ''){
                    // Upload de img
                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                            $_SESSION['img'] = $imagem;
                            Painel::alert('sucesso','Atualizado com sucesso junto com a img');
                        }else{
                            Painel::alert('erro','Ocorreu um erro ao atualizar junto com a img');
                        }
                    }else{
                        Painel::alert('erro','O formato da imagem não e valido');
                    }
                }else{
                    $imagem = $imagem_atual;
                    if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                        Painel::alert('sucesso','Atualizado com sucesso');
                    }else{
                        Painel::alert('erro','Ocorreu um erro ao atualizar');
                    }
                }
            }
        ?>

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
        </div><!--form-group-->
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" required value="<?php echo $_SESSION['password']; ?>">
        </div><!--form-group-->
        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem" >
            <input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
            <p>Formatos aceitos: jpg,png e jpeg</p>
            <p>Tamanho: 520x520</p>
        </div><!--form-group-->
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form-group-->
    </form>

</div><!--box-content-->

