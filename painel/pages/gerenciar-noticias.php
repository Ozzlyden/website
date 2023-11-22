<?php
    // DELETAR NOTICIAS
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $selectImg = MySql::conectar()->prepare("SELECT capa FROM `tb_site.noticias` WHERE id = ?");
        $selectImg->execute(array($_GET['excluir']));
        $img = $selectImg->fetch()['capa'];
        Painel::deleteFile($img);
        Painel::deletar('tb_site.noticias', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-noticias');
    }else if(isset($_GET['order'])){
        Painel::orderItem('tb_site.noticias',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $noticias = Painel::selectAll('tb_site.noticias',($paginaAtual - 1) * $porPagina,$porPagina * $paginaAtual);

?>

<div class="box-content">
    <h2><i class="fa-solid fa-book" aria-hidden="true"></i> Gerenciar Notícias</h2>
    <div class="wraper-table">
        <table>
            <tr>    
                <td>Titulo</td>
                <td>Categoria</td>
                <td>Imagem de capa</td>
                <td>Editar</td>
                <td>Deletar</td>
                <td>Up</td>
                <td>Down</td>
            </tr>

            <?php
                foreach($noticias as $key => $value){
                    $nomeCategoria = Painel::select('tb_site.categorias','id=?',array($value['categoria_id']))['nome'];
            ?>
            
            <tr>
                <td><?php echo $value['titulo']; ?></td>
                <td><?php echo $nomeCategoria; ?></td>
                <td><img style="width:50px;height:50px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['capa']; ?>" /><?php echo $value['capa']; ?></td>
                <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-noticia?id=<?php echo $value['id']; ?>"><i class="fa-solid fa-pencil"></i>Editar</a></td>
                <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?excluir=<?php echo $value['id']; ?>"><i class="fa-solid fa-ban"></i> Excluir</a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?order=up&id=<?php echo $value['id'] ?>"><i class="fa-solid fa-chevron-up"></i> </a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?order=down&id=<?php echo $value['id']; ?>"><i class="fa-solid fa-chevron-down"></i> </a></td>
            </tr>
            <?php  } ?>
        </table>
    </div><!--wraper-table-->

    <div class="paginacao">
        <?php 
        // SISTEMA DE PAGINACAO
            $totalPagina = ceil(count(Painel::selectAll('tb_site.noticias')) / $porPagina);   //ceil arredonda o valor
                
            for($i = 1; $i <= $totalPagina; $i++){
                if($i == $paginaAtual){
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-noticias?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-noticias?pagina='.$i.'">'.$i.'</a>';
                }
            }
            
        ?>
    </div><!--paginacao-->

</div><!--box-content-->

