<section class="banner-conteiner">
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>../web_site/img/work.jpg');" class="banner-single"></div>
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>../web_site/img/work1.jpg');" class="banner-single"></div>
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>../web_site/img/work2.jpg');" class="banner-single"></div> 
        <div class="overlay">
            <div class="center"><!--center-->

            <?php
                // Verificacao de envio de email
                if (isset($_POST['acao'])){
                    // formulario enviado
                    if($_POST['email'] != ''){
                        $email = $_POST['email'];

                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $mail = new Email('valente-victor@hotmail.com', 'ozzly.den@gmail.com', 'senha123', 'Victor');
                            $mail->addAdress('valente-victor@hotmail.com', 'Victor');
                            $corpo =  "Email cadastrado<hr>$email";
                            $info = array('assunto'=>'Asssunto Test', 'corpo'=>$corpo);
                            //$info = ['assunto'=>'Asssunto Test', 'corpo'=>$email];;
                            $mail->formatarEmail($info);

                            if($mail->enviarEmail()){
                                echo '<script> alert("Email enviado com sucesso")</script>';
                            }else{
                                echo '<script> alert("Erro ao enviar email")</script>';
                            }

                        }else{
                                echo '<script> alert("Email invalido") </script>';
                        }
                    }else{
                        echo '<script> alert("Campo vazio nao permitido") </script>';
                    }            
                }
            ?>

                <form method="post">
                    <h2>Qual o seu email ?</h2>
                    <input type="email" name="email" required/> 
                    <input type="submit" name="acao" value="Cadastrar">
                </form>
            </div>
        </div> 
    <div class="bullets">
        
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
            <img class="right" src="img/autor.jpg">
        </div>
        <div class="clear"></div>
        </div>
    </section>

    <section class="especialidades">
        <div class="center"> <!--center-->
        <h2 class="title">Especialidades</h2>
            <div class="w33 left box-especialidade">
                <h3><i class="fa-brands fa-css3-alt"></i></h3>
                <h4>CSS3</h4>
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
                <h4>HTML5</h4>
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
                <h4>JavaScript</h4>
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
        <div class="clear"></div>
        </div> 
    </section>

    <section class="extras">
        <div class="center">
            <div id="depoimentos" class="w50 left depoimentos-container">
            <h2 class="title">Depoimentos dos nossos clientes</h2>
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
                    <p class="nome-autor">Nome Cliente</p>
                </div>
                <div class="depoimentos-single">
                    <p class="depoimento-descricao">"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit anim id est laborum."
                    </p>
                    <p class="nome-autor">Nome Cliente</p>
                </div>
                <div class="depoimentos-single">
                    <p class="depoimento-descricao">"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ull officia deserunt mollit anim id est laborum."
                    </p>
                    <p class="nome-autor">Nome Cliente</p>
                </div>
            </div>
            <div id="servicos" class="w50 left servicos-container"> <!--w50-->
            <h2 class="title">Serviços</h2>
                <div class="servicos">
                    <ul>
                        <li>Serviço 1</li>
                        <li>Serviço 2</li>
                        <li>Serviço 3</li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>