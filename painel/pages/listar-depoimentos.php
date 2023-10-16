<?php
    $depoimentos = Painel::selectAll('tb_site.depoimentos');
?>

<div class="box-content">
    <h2><i class="fa-solid fa-book"></i> Depoimentos Cadastrados</h2>
 
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
            <td><a class="btn delete" href=""><i class="fa-solid fa-ban"></i></a> Excluir</td>
        </tr>
        <?php  } ?>
    </table>

</div><!--box-content-->

