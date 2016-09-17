<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <html>
        <head>

            <!-- Título -->
            <title><?php echo (isset($titulo) ? $titulo : $facebook['titulo']); ?></title>
            <!-- Título -->

            <!-- Início Metas -->
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=2, initial-scale=1.0" />
            <meta name="google" value="notranslate">
            <meta name="google-site-verification" content="i4DqExoCE1XAyE_Xft5XeRVL5kSZBm7fyOJXvoQEuLs" />

            <?php if (isset($facebook['description'])) { ?>
                <meta name="description" content="<?php echo $facebook['description']; ?>" /> 
            <?php } ?>

            <?php if (isset($facebook['keywords'])) { ?>
                <meta name="keywords" content="<?php echo $facebook['keywords']; ?>" /> 
            <?php } ?>
            <!-- Fim Metas -->
            <!-- Facebook -->
            <meta property="og:description" content="<?php echo $facebook['descricao']; ?>" />
            <meta property="og:image"       content="<?php echo $facebook['imagem']; ?>" />
            <?php if (isset($facebook['w'])) { ?>
                <meta property="og:image:width" content="<?php echo $facebook['w']; ?>" />
            <?php } ?>
            <?php if (isset($facebook['h'])) { ?>
                <meta property="og:image:height" content="<?php echo $facebook['h']; ?>" />
            <?php } ?>
                
            <meta property="og:url"         content="<?php echo $facebook['url']; ?>" />
            <meta property="og:type"        content="website" />
            <meta property="og:title"       content="<?php echo $facebook['titulo']; ?>" />
            <meta property="article:tag" content="quiz">
            <meta property="article:author" content="http://www.facebook.com/appjoyme" />
            <meta property="article:publisher" content="http://www.facebook.com/appjoyme" />
            <meta property="og:site_name" content="APPJOY" />
            <meta property="fb:locale" content="pt_BR">
            <meta property="fb:app_id" content="1032556036755193" />
            <!-- Fim Faceook -->

            <link rel="canonical" href="<?php echo $facebook['url']; ?>" />
            <?php if (isset($facebook['imagem'])) { ?>
                <link rel="image_src" href="<?php echo $facebook['imagem']; ?>" />
            <?php } ?>
            <?php if (isset($facebook['id'])) { ?>
                <link rel="facebook_url" href="https://www.facebook.com/<?php echo $facebook['id']; ?>" />
            <?php } ?>

            <link rel="shortcut icon" href="<?php echo base_s3("web/images/faviconee.png"); ?>" />
            <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_s3("web/css/estilos.css"); ?>" />
            <link type="text/css" rel="stylesheet" media="all" href="<?php echo base_s3("web/js/bxslider/jquery.bxslider.css"); ?>" />
            <script type="text/javascript">
                var BASE_URL = '<?php echo base_url(); ?>';
            </script>
            <script src="https://apis.google.com/js/platform.js" async defer>
                {
                    lang: 'pt-BR'
                }
            </script>
            <!-- [if lt IE 9]
                    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif] -->
            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-74745061-1', 'auto');
                ga('send', 'pageview');

            </script>

        </head>
        <body>

            <!-- adnow-verification-code:5dcfee1b499a5b51f49dbb418b1cc9bb -->
            <?php if (!isDesktop() && $tipo == 'resultado') { ?>
                <div id="carr">
                    <div class="cont">
                        <img width="100" src="<?php echo base_s3("web/images/loading-spinning-bubbles.svg"); ?>" alt="carregando" />
                        <h3><?php echo locate("Carregando..."); ?></h3>
                    </div>
                </div>
            <?php } ?>
            <?php if (ENVIRONMENT == 'development' && $_SERVER['SERVER_ADDR'] == '127.0.0.1') { ?>
                <div id="developer" style="background-color:red;display:block;width:100%;height:10px;"></div>
            <?php } else if ($_SERVER['SERVER_ADDR'] == '127.0.0.1') { ?>
                <div id="developer" style="background-color:yellow;display:block;width:100%;height:10px;"></div>
            <?php } ?>

            <!-- Facebook APP Conexão -->		
            <div id="fb-root"></div>
            <script>
                window.fbAsyncInit = function () {
                    FB.init({
                        appId: '1032556036755193',
                        xfbml: true,
                        version: 'v2.4'
                    });
                };
                (function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {
                        return;
                    }
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/pt_BR/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>
            <!-- Fim Facebook -->		


            <header id="topo">
                <!--/topo2-->
                <div id="topo3">
                    <div class="container">
                        <div id="logosite">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_s3("web/images/logo-site.png"); ?>" alt="logo" /></a>
                        </div>
                        <div id="fb-curtir-topo">
                            <div class="fb-like" data-href="https://www.facebook.com/appjoyme" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                        </div>
                        <nav class="menu-info">
                            <ul>
                                <li class="ptbr"><a href="http://pt.appjoy.me/"></a></li>
                                <li class="usa"><a href="http://en.appjoy.me/"></a></li>
                                <li class="spain"><a href="http://es.appjoy.me/"></a></li>
                            </ul>
                        </nav>
                        <!--/menu-info-->
                    </div>
                    <!--/container-->
                </div>
                <!--/topo3-->
            </header>
            <!--/topo-->