<?php 
    $url = explode('/',$_GET['url']);
    if(!isset($url[2])){
?>

<section class="header-noticias">
    <div class="center">
        <h2><i class="fa-regular fa-bell"></i></h2>
        <h2>Acompanhe as ultimas noticias do portal</h2>
    </div> <!--center-->

</section><!--header-noticias-->

<section class="conteiner-portal">
    <div class="center">
        <div class="sidebar"> 
            <div class="box-content-sidebar">
                <h3><i class="fa-solid fa-magnifying-glass"></i> Realizar busca:</h3>
                <form>
                    <input type="text" name="parametro" placeholder="O que deseja procurar ?" required>
                    <input type="submit" name="buscar" value="Pesquisa">
                </form>
            </div><!--box-content-sidebar-->
            <div class="box-content-sidebar">
                <h3><i class="fa-solid fa-list"></i> Selecione a categoria:</h3>
                <form>
                    <select name="categoria">
                        <?php 
                            $categorias = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` ORDER BY order_id ASC");
                            $categorias->execute();
                            $categorias = $categorias->fetchAll();
                            foreach($categorias as $key => $value){
                        ?>
                        <option value="<?php echo $value['slug'] ?>"><?php echo $value['nome'] ?></option>
                        <?php } ?>
                    </select>
                </form>
            </div><!--box-content-sidebar-->

            <div class="box-content-sidebar">
                <h3><i class="fa-regular fa-user"></i> Sobre o autor:</h3>
                <div class="autor-box-portal">
                    <div class="box-img-autor"></div>
                    <div class="texto-autor-portal">
                        <?php 
                            $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
                            $infoSite->execute();
                            $infoSite = $infoSite->fetch();
                            
                        ?>
                        <h3><?php echo $infoSite['nome_autor'] ?></h3>
                        <p><?php echo substr($infoSite['descricao'],0,300).'...' ?></p>
                    </div><!--texto-autor-portal-->
                </div><!--autor-box-portal-->
            </div><!--box-content-sidebar-->
        </div><!--sidebar-->

        <div class="conteudo-portal" >
            <div class="header-conteudo-portal">
                <!--<h2 > Visualizando todos os Posts</h2>-->
                <h2>Visualizando Post em <span>Esportes</span></h2>
            </div><!--conteudo-portal-->

            <?php 
                 for($i = 0; $i < 5; $i++){
            ?>
            <div class="box-single-conteudo">
                <h2>19/09/2000 - Conheça nova comissão esportiva</h2>
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur."</p>
                <a href="<?php echo INCLUDE_PATH; ?>noticias/esportes/nome-post">Leia mais</a>
            </div><!--box-single-conteudo-->
            <?php }?>

            <div class="paginator">
                <a class="active-page" href="">1</a>
                <a href="">2</a>
                <a href="">3</a>
                <a href="">4</a>
            </div><!--paginator-->
        </div><!--conteudo-portal-->

    </div><!--center-->
    <div class="clear"></div>
</section><!--conteiner-portal-->

<?php }else{ 
    include('noticias_single.php');
    }
?>
