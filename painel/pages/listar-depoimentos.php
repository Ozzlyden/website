<?php
    // DELETAR DEPOIMENTO
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site.depoimentos', $idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimentos');
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $depoimentos = Painel::selectAll('tb_site.depoimentos',($paginaAtual - 1) * $porPagina,$porPagina * $paginaAtual);

?>

<div class="box-content">
    <h2><i class="fa-solid fa-book" aria-hidden="true"></i> Depoimentos Cadastrados</h2>
    <div class="wraper-table">
        <table>
            <tr>    
                <td>Nome</td>
                <td>Data</td>
                <td>Editar</td>
                <td>Deletar</td>
            </tr>

            <?php
                foreach($depoimentos as $key => $value){
            ?>
            <tr>
                <td><?php echo $value['nome']; ?></td>
                <td><?php echo $value['data']; ?></td>
                <td><a class="btn edit" href=""><i class="fa-solid fa-pencil"></i></a>Editar</td>
                <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos?excluir=<?php echo $value['id']; ?>"><i class="fa-solid fa-ban"></i></a> Excluir</td>
            </tr>
            <?php  } ?>
        </table>
    </div><!--wraper-table-->

    <div class="paginacao">
        <?php 
        // SISTEMA DE PAGINACAO
            $totalPagina = ceil(count(Painel::selectAll('tb_site.depoimentos')) / $porPagina);   //ceil arredonda o valor
                
            for($i = 1; $i <= $totalPagina; $i++){
                if($i == $paginaAtual){
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                }else{
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                }
            }
            
        ?>
    </div><!--paginacao-->

</div><!--box-content-->

