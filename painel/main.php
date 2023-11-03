<?php
// VERIFICACAO DE LOGGOUT
if (isset($_GET['loggout'])) {
    Painel::loggout();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo INCLUDE_PATH; ?>../web_site/painel/css/style.css" rel="stylesheet" />
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
                if ($_SESSION['img'] == '') {
                ?>
                    <div class="avatar-usuario">
                        <i class="fa-regular fa-user"></i>
                    </div><!--avatar-usuario-->
                <?php } else { ?>
                    <div class="img-usuario">
                        <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>">
                    </div><!--img-usuario-->
                <?php } ?>

                <div class="nome-usuario">
                    <p><?php echo $_SESSION['nome']; ?></p>
                    <p><?php echo pegaCargo($_SESSION['cargo']); ?> </p>
                </div><!--nome-usuario-->
            </div><!--box-usuario-->

            <div class="items-menu">
                <h2>Cadastro</h2>
                <a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar Depoimento</a>
                <a <?php selecionadoMenu('cadastrar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-servicos">Cadastrar Serviço</a>
                <a <?php selecionadoMenu('cadastrar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides">Cadastrar Slides</a>
                
                <h2>Gestão</h2>
                <a <?php selecionadoMenu('listar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos">Listar Depoimentos</a>
                <a <?php selecionadoMenu('listar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos">Listar Serviços</a>
                <a <?php selecionadoMenu('listar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides">Listar Slides</a>
                
                <h2>Administração do painel</h2>
                <a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuário</a>
                <a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuário</a>
                
                <h2>Configuração Geral</h2>
                <a <?php selecionadoMenu('editar-site'); ?> href="">Editar Site</a>
            </div><!--items-menu-->
        </div><!--menu-wraper-->
    </div><!--menu-->

    <header>
        <div class="center">

            <div class="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </div><!--menu-btn-->

            <div class="loggout">
                <a href="<?php echo INCLUDE_PATH_PAINEL; ?>"><i class="fa-solid fa-home"></i><span> Pagina Inicial </span></a>
                <a href="<?php echo INCLUDE_PATH_PAINEL; ?>?loggout"><i class="fa-solid fa-right-from-bracket"></i><span> Sair </span></a>
            </div> <!--loggout-->
        </div><!--center-->

        <div class="clear"></div>
    </header>

    <div class="content">

        <!--Redirecionamento-->
        <?php Painel::carregarPagina(); ?>

    </div> <!--content-->

    <script src="https://kit.fontawesome.com/0720f753f2.js" crossorigin="anonymous"></script>
    <script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>

</body>

</html>