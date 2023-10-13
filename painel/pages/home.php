<?php
    $usuariosOnline = Painel::listarUsuariosOnline();
    $totalVisitas = Painel::listarVisitas();
    $totalVisitasHoje = Painel::listarVisitasHoje();
?>

<div class="box-content left w100">
    <h2><i class="fa-solid fa-house-user"></i>Painel de Controle</h2>

    <div class="box-metricas">
        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Usuário Online</h2>
                <p><?php echo count($usuariosOnline); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-singel-->
        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Total de Visitas</h2>
                <p><?php echo count($totalVisitas); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-singel-->
        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Visitas Hoje</h2>
                <p><?php echo count($totalVisitasHoje); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-singel-->
        <div class="clear"></div>
    </div><!--box-metrica-->

</div> <!--box-content-->


<div class="clear"></div>


<div class="box-content w100">
    <h2><i class="fa-solid fa-user-group"></i>Usuarios Online Site</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <i class="fa-solid fa-wifi"></i><span>IP</span>
            </div>
            <div class="col">
                <i class="fa-solid fa-down-long"></i><span>Ultima ação</span>
            </div>
            <div class="clear"></div>
        </div><!--row-->

        <?php 
        $usuariosPainel = Painel::listarUsuariosPainel();
            foreach($usuariosOnline as $key => $value){
        ?>
        <div class="row">
            <div class="col">
                <span><?php echo $value['ip'] ?></span>
            </div>
            <div class="col">
                <span><?php echo date('d/m/y H:i:s',strtotime($value['ultima_acao'])) ?></span>
            </div>
            <div class="clear"></div>
        </div><!--row-->
        <?php } ?>
    </div><!--table-responsive-->
</div>

<div class="box-content w100">
    <h2><i class="fa-solid fa-user-group"></i>Usuarios Online Painel</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <i class="fa-solid fa-wifi"></i><span>Nome</span>
            </div>
            <div class="col">
                <i class="fa-solid fa-down-long"></i><span>Cargo</span>
            </div>
            <div class="clear"></div>
        </div><!--row-->

        <?php
        
            foreach($usuariosPainel as $key => $value){
        ?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['user'] ?></span>
            </div>
            <div class="col">
                <span><?php echo pegaCargo($value['cargo']); ?></span>
            </div>
            <div class="clear"></div>
        </div><!--row-->
        <?php } ?>
    </div><!--table-responsive-->
    <div class="clear"></div>
</div>