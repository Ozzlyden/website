<?php
    // DELETAR SLIDES
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $selectImg = MySql::conectar()->prepare("SELECT img FROM `tb_site.slides` WHERE id = ?");
        $selectImg->execute(array($_GET['excluir']));
        $img = $selectImg->fetch()['img'];
        Painel::deleteFile($img);
        Painel::deletar('tb_site.slides', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
    }else if(isset($_GET['order'])){
        Painel::orderItem('tb_site.slides',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $slides = Painel::selectAll('tb_site.slides',($paginaAtual - 1) * $porPagina,$porPagina * $paginaAtual);

?>

<div class="box-content">
    <h2><i class="fa-solid fa-book" aria-hidden="true"></i>Slides Cadastrados</h2>
    <div class="wraper-table">
        <table>
            <tr>    
                <td>Nome</td>
                <td>Imagem</td>
                <td>Editar</td>
                <td>Deletar</td>
                <td>Up</td>
                <td>Down</td>
            </tr>

            <?php
                foreach($slides as $key => $value){
            ?>
            
            <tr>
                <td><?php echo $value['nome']; ?></td>
                <td><img style="width:50px;height:50px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['img']; ?>" /><?php echo $value['img']; ?></td>
                <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-slide?id=<?php echo $value['id']; ?>"><i class="fa-solid fa-pencil"></i>Editar</a></td>
                <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?excluir=<?php echo $value['id']; ?>"><i class="fa-solid fa-ban"></i> Excluir</a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=up&id=<?php echo $value['id'] ?>"><i class="fa-solid fa-chevron-up"></i> </a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides?order=down&id=<?php echo $value['id']; ?>"><i class="fa-solid fa-chevron-down"></i> </a></td>
            </tr>
            <?php  } ?>
        </table>
    </div><!--wraper-table-->

    <div class="paginacao">
        <?php 
        // SISTEMA DE PAGINACAO
            $totalPagina = ceil(count(Painel::selectAll('tb_site.slides')) / $porPagina);   //ceil arredonda o valor
                
            for($i = 1; $i <= $totalPagina; $i++){
                if($i == $paginaAtual){
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
                }
            }
            
        ?>
    </div><!--paginacao-->

</div><!--box-content-->

