<?php
    // DELETAR SERVICOS
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site.servicos', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servicos');
    }else if(isset($_GET['order'])){
        Painel::orderItem('tb_site.servicos',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $servicos = Painel::selectAll('tb_site.servicos',($paginaAtual - 1) * $porPagina,$porPagina * $paginaAtual);

?>

<div class="box-content">
    <h2><i class="fa-solid fa-book" aria-hidden="true"></i> Serviços Cadastrados</h2>
    <div class="wraper-table">
        <table>
            <tr>    
                <td>Serviço</td>
                <td>Editar</td>
                <td>Deletar</td>
                <td>Up</td>
                <td>Down</td>
            </tr>

            <?php
                foreach($servicos as $key => $value){
            ?>
            
            <tr>
                <td><?php echo $value['servicos']; ?></td>
                <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-servico?id=<?php echo $value['id']; ?>"><i class="fa-solid fa-pencil"></i>Editar</a></td>
                <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?excluir=<?php echo $value['id']; ?>"><i class="fa-solid fa-ban"></i> Excluir</a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?order=up&id=<?php echo $value['id'] ?>"><i class="fa-solid fa-chevron-up"></i> </a></td>
                <td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos?order=down&id=<?php echo $value['id']; ?>"><i class="fa-solid fa-chevron-down"></i> </a></td>
            </tr>
            <?php  } ?>
        </table>
    </div><!--wraper-table-->

    <div class="paginacao">
        <?php 
        // SISTEMA DE PAGINACAO
            $totalPagina = ceil(count(Painel::selectAll('tb_site.servicos')) / $porPagina);   //ceil arredonda o valor
                
            for($i = 1; $i <= $totalPagina; $i++){
                if($i == $paginaAtual){
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
                }
            }
            
        ?>
    </div><!--paginacao-->

</div><!--box-content-->

