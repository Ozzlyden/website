<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo INCLUDE_PATH; ?>../web_site/painel/css/style.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--GoogleFonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> <!--GoogleFonts-->
    <title>Pagina Login</title>
</head>
<body>

    <div class="box-login">

        <?php

            if(isset($_POST['acao'])){
				$user = $_POST['user'];
				$password = $_POST['password'];
				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
				$sql->execute(array($user,$password));

				$errorInfo = $sql->errorInfo();
				if ($errorInfo[0] !== '00000') {
				// Houve um erro na execução da consulta
				echo 'Erro: ' . $errorInfo[2];
				}

				// LOGIN BEM SUCEDIDO
				if($sql->rowCount() == 1){
					$info = $sql->fetch();
					// Session do BD
					$_SESSION['login'] = true;
					$_SESSION['user'] = $user;          // Guardando info na SESSION
					$_SESSION['password'] = $password;
					$_SESSION['img'] = $info['img'];
					$_SESSION['nome'] = $info['nome'];
					$_SESSION['cargo'] = $info['cargo'];

					header('Location: '.INCLUDE_PATH_PAINEL);   // Mandar para o painel.php
					die();
				}else{
                    // Falha no login
					echo '<div class="erro-box"> Usuário ou senha incorretos!</div>';
				}
			}
            
        ?>

        <h2>Faça o seu login:</h2>
        <form method="post">
            <input type="text" name="user" placeholder="login..." required>
            <input type="password" name="password" placeholder="Senha..." required>
            <input type="submit" name="acao" value="Conectar">
        </form>
    </div><!--box-login-->

<script src="https://kit.fontawesome.com/0720f753f2.js" crossorigin="anonymous"></script>
    
</body>
</html>