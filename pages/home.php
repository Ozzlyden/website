<section class="banner-conteiner">
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>../img/work.jpg');" class="banner-single"></div>
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>../img/work1.jpg');" class="banner-single"></div>
    <div style="background-image: url('<?php echo INCLUDE_PATH; ?>../img/work2.jpg');" class="banner-single"></div> 
        <div class="overlay">
            <div class="center"><!--center-->
                <form method="post">
                    <h2>Qual o seu email ?</h2>
                    <input type="email" name="email" required/> 
                    <input type="hidden" name="identificador" value="form_home"/>
                    <input type="submit" name="acao" value="Cadastrar">
                </form>
            </div>
        </div> 
    <div class="bullets">
    </div> <!--bullets -->
    
</section> <!--banner-->

    <section class="descricao-autor">  
        <div class="center">
            <div class="w50 left"> 
                <h2><?php echo $infoSite['nome_autor']; ?></h2>
                <p><?php echo $infoSite['descricao']; ?></p>
            </div> <!--w50-->
        <div class="w50 left">
            <img class="right" src="img/autor.jpg">
        </div><!--w50-->
        <div class="clear"></div>
        </div><!--center-->
    </section>

    <section class="especialidades"> 
        <div class="center"> 
        <h2 class="title">Especialidades</h2>
            <div class="w33 left box-especialidade">
                <h3><i class="<?php echo $infoSite['icone1']; ?>"></i></h3>
                <h4>CSS3</h4>
                <p><?php echo $infoSite['descricao1']; ?></p>
            </div>
            <div class="w33 left box-especialidade">
                <h3><i class="<?php echo $infoSite['icone2']; ?>"></i></h3>
                <h4>HTML5</h4>
                <p><?php echo $infoSite['descricao2']; ?></p>
            </div>
            <div class="w33 left box-especialidade">
                <h3><i class="<?php echo $infoSite['icone3']; ?>"></i></h3>
                <h4>JavaScript</h4>
                <p><?php echo $infoSite['descricao3']; ?></p>
            </div>
        <div class="clear"></div>
        </div> <!--center-->
    </section>

    <section class="extras">
        <div class="center">
            <div id="depoimentos" class="w50 left depoimentos-container">
            <h2 class="title">Depoimentos dos nossos clientes</h2>
            <?php 
                // Pegar os depoimentos do BD
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3");
                $sql->execute();
                $depoimentos = $sql->fetchAll();
                foreach($depoimentos as $key => $value){
            ?>
                <div class="depoimentos-single">
                    <p class="depoimento-descricao">"<?php echo $value['depoimento']; ?>"</p>
                    <p class="nome-autor"><?php echo $value['nome']; ?> - <?php echo $value['data']; ?></p>
                </div>
                <?php } ?>
            </div>
            <div id="servicos" class="w50 left servicos-container">
            <h2 class="title">Serviços</h2>
                <div class="servicos">
                    <ul>
                        <?php
                            // Pegar os servicos do BD
                             $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.servicos` ORDER BY order_id ASC LIMIT 3");
                             $sql->execute();
                            $servicos = $sql->fetchAll();
                            foreach($servicos as $key => $value){  
                        ?>
                        <li><?php echo $value['servicos']; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div><!--w50-->
            <div class="clear"></div>
        </div><!--center-->
    </section>