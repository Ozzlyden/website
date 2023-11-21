<?php
    // DELETAR CATEGORIAS
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site.categorias', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-categorias');
    }else if(isset($_GET['order'])){
        Painel::orderItem('tb_site.categorias',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $categorias = Painel::selectAll('tb_site.categorias',($paginaAtual - 1) * $porPagina,$porPagina * $paginaAtual);

?>

<div class="box-content">
    <h2><i class="fa-solid fa-book" aria-hidden="true"></i>Gerenciar Categorias</h2>
    <div class="wraper-table">
        <table>
            <tr>    
                <td>Nome</td>
                <td>Editar</td>
                <td>Deletar</td>
                <td>Up</td>
                <td>Down</td>
            </tr>

            <?php
                foreach($categorias as $key => $value){
            ?>
            
            <tr>
                <td><?php echo $value['nome']; ?></td>
                <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-categorias?id=<?php echo $value['id']; ?>"><i class="fa-solid fa-pencil"></i>Editar</a></td>
                <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?excluir=<?php echo $value['id']; ?>"><i class="fa-solid fa-ban"></i> Excluir</a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?order=up&id=<?php echo $value['id'] ?>"><i class="fa-solid fa-chevron-up"></i> </a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?order=down&id=<?php echo $value['id']; ?>"><i class="fa-solid fa-chevron-down"></i> </a></td>
            </tr>
            <?php  } ?>
        </table>
    </div><!--wraper-table-->

    <div class="paginacao">
        <?php 
        // SISTEMA DE PAGINACAO
            $totalPagina = ceil(count(Painel::selectAll('tb_site.categorias')) / $porPagina);   //ceil arredonda o valor
                
            for($i = 1; $i <= $totalPagina; $i++){
                if($i == $paginaAtual){
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-categorias?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-categorias?pagina='.$i.'">'.$i.'</a>';
                }
            }
            
        ?>
    </div><!--paginacao-->

</div><!--box-content-->

