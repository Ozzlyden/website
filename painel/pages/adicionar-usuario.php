<?php 
    verificaPermissaoPagina(2);
?>

<div class="box-content">
    <h2><i class="fa-solid fa-pen"></i> Adicionar Usuário</h2>
 
    <form method="post" enctype="multipart/form-data">

        <?php 
            if(isset($_POST['acao'])){

                // Paramentros class Usuario.php
                $nome = $_POST['nome'];
                $login = $_POST['login'];
                $senha = $_POST['password'];
                $imagem = $_FILES['imagem'];
                $cargo = $_POST['cargo'];

                // Verificacoes
                if($login == ''){
                    Painel::alert('erro','Login não esta preenchido');
                }else if($nome == ''){
                    Painel::alert('erro','Nome não esta preenchido');
                }else if($senha == ''){
                    Painel::alert('erro','Senha não esta preenchida');
                }else if($imagem['name'] == ''){
                    Painel::alert('erro','Imagem não foi colocada');
                }else if($cargo == ''){
                    Painel::alert('erro','Cargo não foi preenchido');
                }else{

                    if($cargo >= $_SESSION['cargo']){
                        Painel::alert('erro','Selecione um cargo menor que o seu');
                    }else if(Painel::imagemValida($imagem) == false){
                        Painel::alert('erro','O formato da imagem não aceito');
                    }else if(Usuario::userExists($login)){
                        Painel::alert('erro','Login ja existente');
                    }else{
                        // Cadastro do BD
                        include('../classes/lib/WideImage.php');    // o certo seria colocar no config.php
                        $usuario = new Usuario();

                        // Redimencionamento usando a lib WideImagem
                        //WideImage::load('uploads/'.$imagem)->resize(100)->saveToFile('uploads/'.$imagem);   // deixando a img em 100px e mais leve            

                        $imagem = Painel::uploadFile($imagem);
                        $usuario->cadastrarUsuario($login, $senha, $imagem, $nome, $cargo);
                        Painel::alert('sucesso','Cadastro do '.$login.' foi feito com sucesso');
                    }
                }
            }
            
        ?>

        <div class="form-group">
            <label>Login:</label>
            <input type="text" name="login">
        </div><!--form-group-->
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome">
        </div><!--form-group-->
        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password">
        </div><!--form-group-->
        <div class="form-group">
            <label>Cargo:</label>
            <select name="cargo">
                <?php
                    // Sistema de adicionar cargo
                    foreach(Painel::$cargos as $key => $value){
                        if($key < $_SESSION['cargo']) echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                ?>
            </select>
        </div>
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

