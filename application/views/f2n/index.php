<div id="home" class="conteudo row small-up-2 medium-up-3 large-up-5">
    <?php foreach(Aplicativo::getListaDeAplicativos(array(
        "limit"=>15
    )) as $app):   ?> 
    <div class="column">
        <div class="item">
            <a href="<?php echo base_url("a/{$app->getNameID()}"); ?>">
                <figure><img src="<?php echo $app->getImagemChamada(); ?>" alt="<?php echo $app->getTitulo(); ?>" /></figure>
                <h3><?php echo $app->getTitulo(); ?></h3>
                <small>clique e descubra!</small>
            </a>
        </div>
    </div>
    <?php endforeach; ?>

</div>
<div id="carregador-load">
    <div>
        <img src="<?php echo base_storage("web/img/rolling.gif"); ?>" alt="carregando" /> Carregando...
    </div>
</div>

<?php include "footer.php"; ?>