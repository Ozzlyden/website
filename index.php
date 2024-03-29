<?php 
    include('config.php');  // import arquivo
    Site::updateUsuarioOnline();    
    Site::contador(); 

    // Conexao BD
    $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
    $infoSite->execute();
    $infoSite = $infoSite->fetch();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descrição do meu website">
    <meta name="keywords" content="Palavras-chave,do,site">
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--GoogleFonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> <!--GoogleFonts-->
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css" />
    <title><?php echo $infoSite['titulo']; ?></title>
</head>

<body>
    <base base="<?php echo INCLUDE_PATH; ?>" />

    <?php
    // isset eh uma função do PHP que verifica se uma variável está definida e não é nula
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';

    switch ($url) {
        case 'depoimentos':
            echo '<target target="depoimentos" />';
            break;

        case 'servicos':
            echo '<target target="servicos" />';
            break;
    }
    ?>

    <div class="sucesso">Formulario enviado com sucesso!</div>

    <div class="overlay-loading">
        <img src="<?php echo INCLUDE_PATH; ?>../web_site/img/ajax-loader.gif" />
    </div> <!--overlay-loading-->

    <header>
        <div class="center">
            <div class="logo left"> <a href="/web_site"> Logomarca</a> </div>
            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div><!--center-->
    </header>

    <div class="container-principal">
        <!--Recolocando trecho do codigo em outro arquivo-->
        <?php
            if(file_exists('pages/'.$url.'.php')){
                include('pages/'.$url.'.php');
            }else{
                //Podemos fazer o que quiser, pois a página não existe.
                if($url != 'depoimentos' && $url != 'servicos'){
                    $urlPar = explode('/',$url)[0];
                    if($urlPar != 'noticias'){
                    $pagina404 = true;
                    include('pages/404.php');
                    }else{
                        include('pages/noticias.php');
                    }
                }else{
                    include('pages/home.php');
                }
            }
        ?>
    </div>

    <footer>
        <div class="center">
            <p>Todos os direitos reservados</p>
        </div><!--center-->
    </footer>

    <script src="https://kit.fontawesome.com/0720f753f2.js" crossorigin="anonymous"></script> <!--FontAwosome-->
    <script src="<?php echo INCLUDE_PATH; ?>../web_site/js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>../web_site/js/scripts.js"></script>

    <?php
    if ($url == 'home' || $url == '') {
    ?>
        <script src="<?php echo INCLUDE_PATH; ?>../web_site/js/slider.js"></script>
    <?php } ?>

    <!--Caso vai para a contato.php-->
    <?php
    if ($url == 'contato') {
    ?>

    <?php } ?>

    <script defer src="<?php echo INCLUDE_PATH; ?>../web_site/js/formularios.js"></script>
    <script defer src="<?php echo INCLUDE_PATH; ?>../web_site/js/scripts.js"></script>
    <!--<script defer src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCpAcgusc3k56lIsOs9LWU37pkTXLpmT60&callback=Function.prototype'></script> <!--Minha Chave-->
    <script defer src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCpAcgusc3k56lIsOs9LWU37pkTXLpmT60&callback=Function.prototype'></script> <!--Professor Chave-->

</body>

</html>