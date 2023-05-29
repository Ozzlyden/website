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
    <script src="https://kit.fontawesome.com/0720f753f2.js" crossorigin="anonymous"></script> <!--FontAwosome-->
    <link rel="stylesheet" href="css/style.css"/>
    <title>Web Site</title>
</head>
<body>
    <header> 
        <div class="center"> <!--center-->
            <div class="logo left"> Logomarca </div>
            <nav class="desktop right">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Sobre</a></li>
                    <li><a href="">Serviços</a></li>
                    <li><a href="">Contatos</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Sobre</a></li>
                    <li><a href="">Serviços</a></li>
                    <li><a href="">Contatos</a></li>
                </ul>
            </nav>
        <div class="clear"></div>
        </div>
    </header>

    <section class="banner-principal">
        <div class="center"><!--center-->
            <form>
                <h2>Qual o seu email:</h2>
                <input type="email" name="email" required/> 
                <input type="submit" name="acao" value="Cadastrar">
            </form>
        </div>
    </section>

    <section class="descricao-autor">  
        <div class="center"> <!--center-->
        <div class="w50 left">   <!--w50-->
            <h2>Nome Autor</h2>
            <p>It is a long established fact that a reader will be distracted by 
            the readable content of a page when looking at its layout. The 
            point of using Lorem Ipsum is that it has a more-or-less normal 
            distribution of letters, as opposed to using 'Content here, 
            content here', making it look like readable English. Many desktop 
            publishing packages and web page editors now use Lorem Ipsum as their 
            default model text, and a search for 'lorem ipsum' will uncover many web
            sites still in their infancy. Various versions have evolved over the
            years, sometimes by accident, sometimes on purpose (injected humour and
            the like).</p>
        </div>
        <div class="w50 left">   <!--w50-->
            <img src="img/autor.jpg">
        </div>
        <div class="clear"></div>
        </div>
    </section>

    <section class="especialidades">
        <div class="center"> <!--center-->
        <h2 class="title">Especialidades</h2>
            <div class="w33 left box-especialidade">
                <h3><i class="fa-brands fa-css3-alt"></i></h3>
                <h3>Icone CSS3</h3>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                     sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non proident, sunt in culpa qui
                    officia deserunt mollit anim id est laborum."
                </p>
            </div>
            <div class="w33 left box-especialidade">
                <h3><i class="fa-brands fa-html5"></i></h3>
                <h3>Icone HTML5</h3>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                     sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non proident, sunt in culpa qui
                    officia deserunt mollit anim id est laborum."
                </p>
            </div>
            <div class="w33 left box-especialidade">
                <h3><i class="fa-brands fa-square-js"></i></h3>
                <h3>Icone JavaScript</h3>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                     sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur
                    sint occaecat cupidatat non proident, sunt in culpa qui
                    officia deserunt mollit anim id est laborum."
                </p>
            </div>
        </div> 
    </section>

    <section class="extras">
        <div class="center">
            <div class="w50 left">
            <h2 class="title">Depoimentos</h2>
                <div class="depoimentos-single">
                    <p class="depoimento-descricao">"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur
                        sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit anim id est laborum."
                    </p>
                    <p class="nome-autor">Lorem Ipsum</p>
                </div>
                <div class="depoimentos-single">
                    <p class="depoimento-descricao">"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur
                        sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit anim id est laborum."
                    </p>
                    <p class="nome-autor">Lorem Ipsum</p>
                </div>
                <div class="depoimentos-single">
                    <p class="depoimento-descricao">"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur
                        sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit anim id est laborum."
                    </p>
                    <p class="nome-autor">Lorem Ipsum</p>
                </div>
            </div>
            <div class="w50 left"> <!--w50-->
            <h2 class="title">Serviços</h2>
                <div class="servicos">
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                    </ul>
                </div>
            </div>
            <div class="cleear"></div>
        </div>
    </section>

    <footer class="center"> <!--center-->
        <p>Todos os direitos reservados</p>
    </footer>

</body>
</html>