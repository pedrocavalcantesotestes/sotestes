<div id="home" class="conteudo row small-up-2 medium-up-3 large-up-3">
    <?php foreach(Aplicativo::getListaDeAplicativos(array(
        "limit"=>10000
    )) as $app):  ?>
        <?php if($app->getDestaque() == "sim") { ?> 
            <div class="column">
                <div class="item">
                    <a href="<?php echo base_url("a/{$app->getNameID()}"); ?>">
                        <figure><img src="<?php echo $app->getImagemChamada(); ?>" alt="<?php echo $app->getTitulo(); ?>" /></figure>
                        <h3><?php echo $app->getTitulo(); ?></h3>
                        <small>clique e descubra!</small>
                    </a>
                </div>
            </div>
        <?php } ?>
    <?php endforeach; ?>

</div>

<?php include "footer.php"; ?>