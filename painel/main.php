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

    <?php 
        
    ?>

</div>

<header>

    <div class="center">
        <div class="loggout">
            <a href="<?php echo INCLUDE_PATH_PAINEL; ?>?loggout"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div> <!--loggout-->
    </div><!--center-->

    <div class="clear"></div>

</header>

<script src="https://kit.fontawesome.com/0720f753f2.js" crossorigin="anonymous"></script>

</body>
</html>