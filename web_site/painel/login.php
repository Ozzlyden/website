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

    <div class="box-login">
        <h2>Faça o seu login:</h2>
        <form>
            <input type="text" name="user" placeholder="login..." required>
            <input type="password" name="password" placeholder="Senha..." required>
            <input type="submit" name="acao" value="Conectar">
        </form>
    </div><!--box-login-->
    
</body>
</html>