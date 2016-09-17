<?php
$chamada = true;
if (!isset($app)) {
    $chamada = false;
    $app = $resultado->getAplicativo();
}
if (isset($share) && $share == 'sim') {
    ?>
    <script>
        window.location = "<?php echo $app->getURL(); ?>"; 
    </script>
<?php } ?><style>
    /*MOBILE*/
    @media (max-width: 767px) {
        .container{width:90%;} 
        #topo3{height:auto;overflow:hidden; padding-top: 11px; padding-bottom: 9px; padding-right: 0px; padding-left:0px; padding-right: 0px; }
        .in{
            width:100%; position: relative; top:-10px;
        }
    }
</style>


<section id="content-site" class="pagina-app">

    <div class="container in">


        <article class="box-padrao">

            <div id="conteudo-pagina">

                <div class="col-left box-aplicativo">
                    <a href="<?php echo $link; ?>"><img src="<?php echo $imagem; ?>" class="img-responsive-app"/></a>
<div style="display:table; margin:0 auto; margin-bottom:10px;">
    <div class="fb-like" data-href="https://www.facebook.com/appjoyme" data-width="100" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
</div>

                    <h2 class="titulo-aplicativo" style="text-align: center; display: block"><b><?php echo $titulo; ?></b></h2>
            
                        <div style="display: table; margin: 0 auto;">
                         </div> 
         

                    <h3 class="titulo-aplicativo-descricao" style="text-align: center; display: block;"><?php echo $texto; ?></h3>


                 
                        <div style="display: table; margin: 0 auto; margin-bottom: 10px;">
                  
                        </div>
             
                    <div style="margin-top:5px;"> 
                        <?php if ($tipo != 'resultado') { ?>
                            <a href="javascript:resultado('<?php echo $id; ?>');" class="btn-gerar<?php if ($seleciona_signo == 'sim') { ?> modal<?php } ?>"><?php if ($seleciona_signo == 'sim') { ?><?php echo locate("Clique e escolha seu signo"); ?><?php } else { ?><?php echo locate("Clique para fazer o teste"); ?><?php } ?></a>
                        <?php } else { ?>     
                            <a href="javascript:compartilhar('<?php echo current_url(); ?>');" class="btn-facebook" style="font-size:14px; text-align: center;"><?php echo locate("COMPARTILHAR NO FACEBOOK"); ?></a>
                            <a href="<?php echo get_url_app($id); ?>" class="btn-return"><?php echo locate("FAZER NOVAMENTE"); ?></a>
                        <?php } ?>
                    </div>
                </div>

                <?php if (Responsive::isDesktop()) { ?>
                    <div class="col-right box-pub-right">
                        <div class="fb-page" data-href="https://www.facebook.com/appjoyme/" data-width="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/appjoyme/"><a href="https://www.facebook.com/appjoyme/">APPJOY</a></blockquote></div></div>
                        <div id="SC_TBlock_116109" class="SC_TBlock">loading...</div>
                        <script type="text/javascript">var SC_CId = "116109", SC_Domain = "n.ads2-adnow.com";SC_Start_116109 = (new Date).getTime();</script>
                        <script type="text/javascript" src="http://st-n.ads2-adnow.com/js/adv_out.js"></script>
                        <article class="last-update box-padrao" style="padding-bottom:0px; margin-bottom:0px;">                
                            <div class="galeria-aplicativos-lado">               
                                <?php
                                $apps = captura_todos_aplicativos();
                                shuffle($apps);
                                unset($apps_filtrado);
                                for ($i = 0; $i < 4; $i++) {
                                    $apps_filtrado[] = $apps[$i];
                                }
                                foreach ($apps_filtrado as $row) {
                                    ?> 
                                    <div class="box-app-lado">
                                        <div class="content">
                                            <a href="<?php echo get_url_app($row->id); ?>">
                                                <span class="thumb" style="background-image:url('<?php echo $row->imagem_listagem; ?>');"></span>
                                                <div class="nome-app">
                                                    <span class="titulo-app"><?php echo $row->titulo; ?><br />
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </article>
                    </div>
                <?php } ?>

                <div class="col-left box-comentario">
                    <?php if (Responsive::isMobile()) { ?>
                       
                        <div id="SC_TBlock_116112" class="SC_TBlock">loading...</div>
                        <script type="text/javascript">var SC_CId = "116112", SC_Domain = "n.ads3-adnow.com";SC_Start_116112 = (new Date).getTime();</script>
                        <script type="text/javascript" src="http://st-n.ads3-adnow.com/js/adv_out.js"></script>
                        <article class="last-update box-padrao" style="padding-bottom:0px; margin-bottom:0px;">                
                            <div class="galeria-aplicativos-lado">               
                                <?php
                                $apps = captura_todos_aplicativos();
                                shuffle($apps);
                                unset($apps_filtrado);
                                for ($i = 0; $i < 2; $i++) {
                                    $apps_filtrado[] = $apps[$i];
                                }
                                foreach ($apps_filtrado as $row) {
                                    ?> 
                                    <div class="box-app-lado">
                                        <div class="content">
                                            <a href="<?php echo get_url_app($row->id); ?>">
                                                <span class="thumb" style="background-image:url('<?php echo $row->imagem_listagem; ?>');"></span>
                                                <div class="nome-app">
                                                    <span class="titulo-app"><?php echo $row->titulo; ?><br />
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </article>
                    <?php } ?>
<?php if(isDesktop() && $tipo == 'resultado'){ ?>
<div style="display:table; margin: 0 auto;">

<?php echo get_adx($id_autor, array("w" => 645, "h" => 90), 'comentario_desktop'); ?> 
</div>
<?php } ?>
                    <div class="fb-comments" order_by="social" data-href="<?php echo $url_comentario; ?>" data-numposts="8" data-colorscheme="light"></div>

                    <?php if (isMobile()) { ?>  
                    <?php if($tipo == 'resultado'){ ?>
                        <div style="display: table; margin: 0 auto;">
                        <?php echo get_adx($id_autor, array("w" => 300, "h" => 250), 'comentario_mobile'); ?> 
                        </div>
                        <?php } ?>
                        <article class="last-update box-padrao">                
                            <div class="galeria-aplicativos">               
                                <?php
                                $apps = captura_todos_aplicativos();
                                shuffle($apps);
                                unset($apps_filtrado);
                                for ($i = 0; $i < 4; $i++) {
                                    $apps_filtrado[] = $apps[$i];
                                }
                                foreach ($apps_filtrado as $row) {
                                    ?> 
                                    <div class="box-app">
                                        <div class="content">
                                            <a href="<?php echo get_url_app($row->id); ?>">
                                                <span class="thumb" style="background-image:url('<?php echo $row->imagem_listagem; ?>');"></span>
                                                <div class="nome-app">
                                                    <span class="titulo-app"><?php echo $row->titulo; ?><br />
                                                        <span class="countP"><?php echo locate("Clique para ver"); ?></span>
                                                    </span></div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>


                        </div>
                    </article>
                </div>

            </div>
            <!--/conteudo-pagina-->

        </article>




        <!--/container-->
</section>


<!--/content-site-->
</div>
<?php if ($tipo != "resultado") { ?>
    <div id="carregando">
        <div class="divcarregatop"></div>
        <?php if (!isDesktop()) { ?>
            <div class="logocarrega"><img src="<?php echo base_s3("web/images/logo-pequeno.png"); ?>"></div>
        <?php } ?>
        <div id="carregand_show">
            <div class="divcarrega"></div>

            <div class="containercarregar">
                <svg class="ghost" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="127.433px" height="132.743px" viewBox="0 0 127.433 132.743" enable-background="new 0 0 127.433 132.743"
                     xml:space="preserve">
                <path fill="#f24782" d="M116.223,125.064c1.032-1.183,1.323-2.73,1.391-3.747V54.76c0,0-4.625-34.875-36.125-44.375
                      s-66,6.625-72.125,44l-0.781,63.219c0.062,4.197,1.105,6.177,1.808,7.006c1.94,1.811,5.408,3.465,10.099-0.6
                      c7.5-6.5,8.375-10,12.75-6.875s5.875,9.75,13.625,9.25s12.75-9,13.75-9.625s4.375-1.875,7,1.25s5.375,8.25,12.875,7.875
                      s12.625-8.375,12.625-8.375s2.25-3.875,7.25,0.375s7.625,9.75,14.375,8.125C114.739,126.01,115.412,125.902,116.223,125.064z"/>
                <circle fill="#86183e" cx="86.238" cy="57.885" r="6.667"/>
                <circle fill="#86183e" cx="40.072" cy="57.885" r="6.667"/>
                <path fill="#86183e" d="M71.916,62.782c0.05-1.108-0.809-2.046-1.917-2.095c-0.673-0.03-1.28,0.279-1.667,0.771
                      c-0.758,0.766-2.483,2.235-4.696,2.358c-1.696,0.094-3.438-0.625-5.191-2.137c-0.003-0.003-0.007-0.006-0.011-0.009l0.002,0.005
                      c-0.332-0.294-0.757-0.488-1.235-0.509c-1.108-0.049-2.046,0.809-2.095,1.917c-0.032,0.724,0.327,1.37,0.887,1.749
                      c-0.001,0-0.002-0.001-0.003-0.001c2.221,1.871,4.536,2.88,6.912,2.986c0.333,0.014,0.67,0.012,1.007-0.01
                      c3.163-0.191,5.572-1.942,6.888-3.166l0.452-0.453c0.021-0.019,0.04-0.041,0.06-0.061l0.034-0.034
                      c-0.007,0.007-0.015,0.014-0.021,0.02C71.666,63.771,71.892,63.307,71.916,62.782z"/>
                <circle fill="#f24782" stroke="#f24782" stroke-miterlimit="10" cx="18.614" cy="99.426" r="3.292"/>
                <circle fill="#f24782" stroke="#f24782" stroke-miterlimit="10" cx="95.364" cy="28.676" r="3.291"/>
                <circle fill="#f24782" stroke="#f24782" stroke-miterlimit="10" cx="24.739" cy="93.551" r="2.667"/>
                <circle fill="#f24782" stroke="#f24782" stroke-miterlimit="10" cx="101.489" cy="33.051" r="2.666"/>
                <circle fill="#f24782" stroke="#f24782" stroke-miterlimit="10" cx="18.738" cy="87.717" r="2.833"/>
                <path fill="#f24782" stroke="#f24782" stroke-miterlimit="10" d="M116.279,55.814c-0.021-0.286-2.323-28.744-30.221-41.012
                      c-7.806-3.433-15.777-5.173-23.691-5.173c-16.889,0-30.283,7.783-37.187,15.067c-9.229,9.736-13.84,26.712-14.191,30.259
                      l-0.748,62.332c0.149,2.133,1.389,6.167,5.019,6.167c1.891,0,4.074-1.083,6.672-3.311c4.96-4.251,7.424-6.295,9.226-6.295
                      c1.339,0,2.712,1.213,5.102,3.762c4.121,4.396,7.461,6.355,10.833,6.355c2.713,0,5.311-1.296,7.942-3.962
                      c3.104-3.145,5.701-5.239,8.285-5.239c2.116,0,4.441,1.421,7.317,4.473c2.638,2.8,5.674,4.219,9.022,4.219
                      c4.835,0,8.991-2.959,11.27-5.728l0.086-0.104c1.809-2.2,3.237-3.938,5.312-3.938c2.208,0,5.271,1.942,9.359,5.936
                      c0.54,0.743,3.552,4.674,6.86,4.674c1.37,0,2.559-0.65,3.531-1.932l0.203-0.268L116.279,55.814z M114.281,121.405
                      c-0.526,0.599-1.096,0.891-1.734,0.891c-2.053,0-4.51-2.82-5.283-3.907l-0.116-0.136c-4.638-4.541-7.975-6.566-10.82-6.566
                      c-3.021,0-4.884,2.267-6.857,4.667l-0.086,0.104c-1.896,2.307-5.582,4.999-9.725,4.999c-2.775,0-5.322-1.208-7.567-3.59
                      c-3.325-3.528-6.03-5.102-8.772-5.102c-3.278,0-6.251,2.332-9.708,5.835c-2.236,2.265-4.368,3.366-6.518,3.366
                      c-2.772,0-5.664-1.765-9.374-5.723c-2.488-2.654-4.29-4.395-6.561-4.395c-2.515,0-5.045,2.077-10.527,6.777
                      c-2.727,2.337-4.426,2.828-5.37,2.828c-2.662,0-3.017-4.225-3.021-4.225l0.745-62.163c0.332-3.321,4.767-19.625,13.647-28.995
                      c3.893-4.106,10.387-8.632,18.602-11.504c-0.458,0.503-0.744,1.165-0.744,1.898c0,1.565,1.269,2.833,2.833,2.833
                      c1.564,0,2.833-1.269,2.833-2.833c0-1.355-0.954-2.485-2.226-2.764c4.419-1.285,9.269-2.074,14.437-2.074
                      c7.636,0,15.336,1.684,22.887,5.004c26.766,11.771,29.011,39.047,29.027,39.251V121.405z"/>
                </svg>

                <p class="shadowFrame"><svg version="1.1" class="shadow" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="61px" y="20px"
                                            width="122.436px" height="39.744px" viewBox="0 0 122.436 39.744" enable-background="new 0 0 122.436 39.744"
                                            xml:space="preserve">
                    <ellipse fill="#eee" cx="61.128" cy="19.872" rx="49.25" ry="8.916"/>
                    </svg></p>
            </div>
            <h3 class="textocarrega"><?php echo locate("Carregando..."); ?></h3>


            <div style="clear: both"></div>

            <div class="publicidade" style="display: table; margin: 0 auto;">

               <div id="SC_TBlock_117943" class="SC_TBlock">loading...</div> 

<script type="text/javascript">var SC_CId = "117943",SC_Domain="n.ads1-adnow.com";SC_Start_117943=(new Date).getTime();</script>
<script type="text/javascript" src="http://st-n.ads1-adnow.com/js/adv_out.js"></script> 
            </div>
        </div>
    </div>
<?php } ?>