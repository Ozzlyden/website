<?php
    // VERIFICACAO DE LOGGOUT
    if(isset($_GET['loggout'])){
        Painel::loggout();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo INCLUDE_PATH; ?>../web_site/painel/css/style.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--GoogleFonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> <!--GoogleFonts-->
    <title>Painel de controle</title>
</head>

<body>

<div class="menu">
    <div class="menu-wraper">
        <div class="box-usuario">
            <?php
                if($_SESSION['img'] == ''){
            ?>
            <div class="avatar-usuario">
                <i class="fa-regular fa-user"></i>
            </div><!--avatar-usuario-->
            <?php }else { ?>
            <div class="img-usuario">
                <img src="<?php echo INCLUDE_PATH_PAINEL ?> uploads/ <?php echo $_SESSION['img']; ?>">
            </div><!--img-usuario-->
        <?php } ?>    
            
            <div class="nome-usuario">
                <p><?php echo $_SESSION['nome']; ?></p>
                <p><?php echo pegaCargo($_SESSION['cargo']); ?> </p>
            </div><!--nome-usuario-->
        </div><!--box-usuario-->

        <div class="items-menu">
            <h2>Cadastro</h2>
                <a href="">Cadastrar Depoimento</a>
                <a href="">Cadastrar Serviço</a>
                <a href="">Cadastrar Slides</a>
            <h2>Gestão</h2>
                <a href="">Listar Depoimentos</a>
                <a href="">Listar Serviços</a>
                <a href="">Listar Slides</a>
            <h2>Administração do painel</h2>
                <a href="">Editar Usuário</a>
            <h2>Configuração Geral</h2>
                <a href="">Editar Site</a>
	    </div><!--items-menu-->
    </div><!--menu-wraper-->
</div><!--menu-->

<header>
    <div class="center">

        <div class="menu-btn">
            <i class="fa-solid fa-bars"></i>
        </div><!--menu-btn-->

        <div class="loggout">
            <a href="<?php echo INCLUDE_PATH_PAINEL; ?>?loggout"><i class="fa-solid fa-right-from-bracket"></i><span> Sair  </span></a>
        </div> <!--loggout-->
    </div><!--center-->

    <div class="clear"></div>
</header>

<div class="content">
        <div class="box-content left w100">
            <h2><i class="fa-solid fa-house-user"></i>Painel de Controle</h2>

            <div class="box-metricas">
                <div class="box-metrica-single">
                    <div class="box-metrica-wraper">
                        <h2>Usuário Online</h2>
                        <p>10</p>
                    </div><!--box-metrica-wraper-->
                </div><!--box-metrica-singel-->
                <div class="box-metrica-single">
                    <div class="box-metrica-wraper">
                        <h2>Total de Visitaas</h2>
                        <p>100</p>
                    </div><!--box-metrica-wraper-->
                </div><!--box-metrica-singel-->
                <div class="box-metrica-single">
                    <div class="box-metrica-wraper">
                        <h2>Visitas Hoje</h2>
                        <p>3</p>
                    </div><!--box-metrica-wraper-->
                </div><!--box-metrica-singel-->
                <div class="clear"></div>
            </div><!--box-metrica-->

        </div> <!--box-content-->
        
        <!--
        <div class="box-content left w100">
            
        </div> 

        <div class="box-content left w50">
            
        </div> <

        <div class="box-content right w50">
            
        </div> -->

        <div class="clear"></div> 

</div> <!--content-->

<script src="https://kit.fontawesome.com/0720f753f2.js" crossorigin="anonymous"></script>
<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>

</body>
</html>