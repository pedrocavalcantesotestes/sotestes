<?php
$chamada = true;
if (!isset($app)) {
    $chamada = false;
    $app = $resultado->getAplicativo();
}
if (isset($share) && $share == 'sim' && $app->getVotar()[0] != "votar") {
    ?>
    <script>
           window.location = "<?php echo $app->getURL(); ?>";
    </script>
<?php }else{ ?>
<?php if (isset($resultado) && method_exists($resultado, 'getUsuario')) { ?>
    <a href="https://www.facebook.com/<?php echo $resultado->getUsuario()->getId(); ?>" target="_blank" style="display: none">Facebook</a>
<?php } ?>
<style type="text/css">
<?php if ($tipo == 'chamada') { ?>
        .displayresbt{
            display: none !important;
        }
<?php } else { ?>
        .displayappbt{
            display: none !important;
        }
<?php } ?>
</style>

<section class="interno">
    <div class="column row topo">
        <?php if (!empty(Cliente::getCliente()->getAdsense('topo'))) { ?>
            <div style="display: block; margin-bottom: 10px;" class="pubhide">
                <?php echo Cliente::getCliente()->getAdsense('topo'); ?>
            </div>
        <?php } ?>
        <div class="large-8 columns esq">
            <div id="amigos">
                <div id="buscarAmigo">
                    <label>
                        <?php echo (method_exists($app, 'getTituloDeBusca') ? $app->getTituloDeBusca() : 'Digite o nome do amigo(a):'); ?>
                        <input id="searchAmigo" type="text" placeholder="<?php echo (method_exists($app, 'getPlaceholderDeBusca') ? $app->getPlaceholderDeBusca() : 'Busque seu(a) amigo(a):'); ?>" />
                    </label>

                </div>
                <div class="expanded row small-up-2 medium-up-6 large-up-5">
                </div>
            </div>
            <div id="displaycarregador">
                <img class="loading" src="<?php echo base_storage("web/img/loading.svg"); ?>" width="64" height="64" />
                <p>carregando...</p>
            </div>
            <?php if (Responsive::isMobile()) { ?>
                <a href="#" class="button share displayresbt" style="margin-bottom: 10px;" data-href="<?php echo current_url(); ?>"><i><img src="<?php echo base_storage("web/img/icon-facebook.png"); ?>" alt="facebook"></i>Compartilhar no facebook</a>
            <?php } ?>
            <?php if (isset($share) && $share == 'sim' && $app->getVotar()[0] == "votar") { ?>
            <a href="#" data-id="<?php echo $app->getNameID(); ?>" data-tipo="<?php echo (method_exists($app, 'getEstilo') ? $app->getEstilo() : 'padrao'); ?>" class="button gerar gerarResultado displayresbt"><i><img src="<?php echo base_storage("web/img/icon-gerar.png"); ?>" alt="gerar"></i>Crie sua votação também</a>
            <?php } ?>
            <div class="displayapp">
                <?php
                if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "face") !== FALSE && isset($resultado)) {
                    $imagem = $resultado->getImagemResultado();
                }
                ?>

                <figure id="figureapp">
                    <?php if ($tipo == 'chamada') { ?>
                        <a href="javascript:login('<?php echo $app->getNameID(); ?>', '<?php echo (method_exists($app, 'getEstilo') ? $app->getEstilo() : 'padrao'); ?>');"><img src="<?php echo $imagem; ?>" id="imagemapp" alt="<?php echo $titulo; ?>" /></a>
                    <?php } else { ?>
                        <a href="javascript:compartilhar('<?php echo $resultado->getURL(); ?>');"><img src="<?php echo $imagem; ?>" id="imagemapp" alt="<?php echo $titulo; ?>" /></a>
                    <?php } ?>
                </figure>
            </div>
                
                  <?php if (!empty(Cliente::getCliente()->getAdsense('chamada'))) { ?>
            <div style="display:table; margin: 15px auto;" >
             <?php echo Cliente::getCliente()->getAdsense('chamada'); ?>
            </div>
              <?php } ?>

            <?php if ($tipo != 'chamada' && $app->getVotar()[0] == "votar") { ?>
            <!-- Votacao -->
            <script>
                function votar(voto) {

                    console.log("votou " + voto);

                    $.ajax({
                        url: BASE_URL + "home/votar/",
                        type: "post",
                        data: "person=" + voto + "&teste=<?php echo $app->getNameID(); ?>&result=<?php echo substr($resultado->getURL(),(strlen($resultado->getURL())-8),strlen($resultado->getURL())); ?>",
                        success: function (response) {
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                           console.log(textStatus, errorThrown);
                        }

                    });

                    var votos_count = parseInt($("#votos_count_" + voto).text());
                    $("#votos_count_" + voto).html((votos_count + 1));
                    $("#javotou").show();
                    $("#votar1").attr('disabled','disabled');
                    $("#votar2").attr('disabled','disabled');

                }
            </script>

            <div id="votos_count_1" style="font-size:140%; padding:1% 4%;"><?php echo Votos::getVotos('1',$app->getNameID(),substr($resultado->getURL(),(strlen($resultado->getURL())-8),strlen($resultado->getURL()))); ?></div>
            <div id="votos_count_2" style="font-size:140%; padding:1% 4%;"><?php echo Votos::getVotos('2',$app->getNameID(),substr($resultado->getURL(),(strlen($resultado->getURL())-8),strlen($resultado->getURL()))); ?></div>

            <?php if(Votos::jaVotou($app->getNameID(),substr($resultado->getURL(),(strlen($resultado->getURL())-8),strlen($resultado->getURL())))) { ?>
            <center><h3>Você já votou...</h3></center>
            <a disabled class="button votar" style="width:45%; float:left;">votar</a>
            <a disabled class="button votar" style="width:45%; float:right;">votar</a>
            <div class="clearfix"></div>
            <br/><br/>
            <?php } else { ?>
            <center><h3 id="javotou" style="display:none;">Voto computado ;)</h3></center>
            <a href="javascript:votar('1')" id="votar1" class="button votar" style="width:45%; float:left;">votar</a>
            <a href="javascript:votar('2')" id="votar2" class="button votar" style="width:45%; float:right;">votar</a>
            <div class="clearfix"></div>
            <br/>
            <?php } } ?>

            <div class="displayapp">
                <h1 id="tituloapp"><?php echo $titulo; ?></h1>
                <p id="textoapp"><?php echo $texto; ?></p> 
            </div>


            <?php if (Responsive::isMobile() && !empty(Cliente::getCliente()->getAdsense('chamada_mobile'))) { ?>
                <div style="display:table; margin: 15px auto;">
                    <?php echo Cliente::getCliente()->getAdsense('chamada_mobile'); ?>
                </div>
                <div style="display:none;" class="pubshow">
                    <!-- AdNow Carregando -->
                </div>

                <div style="padding:5px 0px;display: table; margin: 0 auto;">
                    <div class="fb-like" data-href="<?php echo Cliente::getCliente()->getPaginaDoFacebook(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                </div>
            <?php } else { ?>
              <?php if (!empty(Cliente::getCliente()->getAdsense('inside'))) { ?>
                <div style="display:table; margin: 15px auto;">
                 <?php echo Cliente::getCliente()->getAdsense('inside'); ?>
                </div>
              <?php } ?>

                <div style="padding:5px 0px;display: table; margin: 0 auto;">
                    <div class="fb-like" data-href="<?php echo Cliente::getCliente()->getPaginaDoFacebook(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                </div>
            <?php } ?>

            <a href="#" data-id="<?php echo $app->getNameID(); ?>" data-tipo="<?php echo (method_exists($app, 'getEstilo') ? $app->getEstilo() : 'padrao'); ?>" class="button login gerarResultado displayappbt">Conectar com o facebook</a>

            <a href="#" class="button share displayresbt" data-href="<?php echo current_url(); ?>"><i><img src="<?php echo base_storage("web/img/icon-facebook.png"); ?>" alt="facebook"></i>Compartilhar no facebook</a>
            <a href="#" data-id="<?php echo $app->getNameID(); ?>" data-tipo="<?php echo (method_exists($app, 'getEstilo') ? $app->getEstilo() : 'padrao'); ?>" class="button gerar gerarResultado displayresbt"><i><img src="<?php echo base_storage("web/img/icon-gerar.png"); ?>" alt="gerar"></i><?php if(isset($share) && $share == 'sim' && $app->getVotar()[0] == "votar") { ?>Criar uma disputa<?php } else { ?>Tentar novamente<?php } ?></a>

              <?php if (!empty(Cliente::getCliente()->getAdsense('comentarios'))) { ?>
            <div style="display:table; margin: 15px auto;">
             <?php echo Cliente::getCliente()->getAdsense('comentarios'); ?>
            </div>
              <?php } ?>

            <section id="comentarios">

                <div class="row">

                    <div class="fb-comments" data-href="<?php echo (isset($app) ? $app->getURL() : $resultado->getAplicativo()->getURL()); ?>" width="100%" data-numposts="3"></div>
                </div>
            </section>

              <?php if (Responsive::isMobile()) { ?>
            <div class="conteudo row small-up-2 large-up-2">

                <?php
                foreach (Aplicativo::getListaDeAplicativos(array(
                    "hide" => array((isset($app) ? $app->getId() : $resultado->getAplicativo()->getId())),
                    "limit" => 10,
                    "order" => "rand"
                )) as $app):
                    ?>
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
              <?php } ?>

            <?php if (Responsive::isMobile() && !empty(Cliente::getCliente()->getAdsense('abaixo_comentarios_mobile'))) { ?>
                <div style="display:table; margin: 15px auto;" class="pubhide">
                    <?php echo Cliente::getCliente()->getAdsense('abaixo_comentarios_mobile'); ?>
                </div>
            <?php } ?>
        </div>
        <div class="large-4 columns dir"> 
            <?php if (Responsive::isDesktop() && !empty(Cliente::getCliente()->getAdsense('sidebar'))) { ?>
                <div>
                   <?php echo Cliente::getCliente()->getAdsense('sidebar'); ?> 
                </div>
            <?php } ?>
            <div style="margin-bottom:15px;"><div class="fb-page" data-href="<?php echo Cliente::getCliente()->getPaginaDoFacebook(); ?>" data-height="600" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div></div>
            <?php
            $adnow = Cliente::getCliente()->getIdAdnow();
            if (!empty($adnow)) {
                ?>
                <script type="text/javascript">var SC_CId = "<?php echo $adnow; ?>", SC_Domain = "n.ads3-adnow.com";
                        SC_Start_<?php echo $adnow; ?> = (new Date).getTime();</script>
                <script type="text/javascript" src="http://st-n.ads3-adnow.com/js/adv_out.js"></script>
                <div style="margin-bottom:20px;"><div id="SC_TBlock_<?php echo $adnow; ?>" class="SC_TBlock">carregando...</div></div>
            <?php } ?>
            <div class="conteudo row small-up-2 large-up-2">

                <?php
                foreach (Aplicativo::getListaDeAplicativos(array(
                    "hide" => array((isset($app) ? $app->getId() : $resultado->getAplicativo()->getId())),
                    "limit" => 4,
                    "order" => "rand"
                )) as $app):
                    ?>
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
        </div>
    </div>
</section>
<?php } ?>