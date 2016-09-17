<!DOCTYPE html>
<html class="no-js" lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="<?php echo base_storage("web/".Cliente::getCliente()->getNome()."/img/favicon.png"); ?>" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Facebook -->
        <meta property="og:url"           content="<?php echo $facebook['url']; ?>" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="<?php echo $facebook['titulo']; ?>" />
        <meta property="og:description"   content="<?php echo $facebook['descricao']; ?>" />

        <meta property="og:site_name"      content="<?php echo Cliente::getCliente()->getTitulo(); ?>" />

        <meta property="og:image"          content="<?php echo $facebook['imagem']; ?>" />
        <meta property="og:image:width"    content="1200" />
        <meta property="og:image:height"   content="630" />
        <meta property="og:image:type"     content="image/jpeg" />

        <meta property="twitter:meta_title" content="<?php echo $facebook['titulo']; ?>">
        <meta property="twitter:description" content="<?php echo $facebook['descricao']; ?>">
        <meta property="twitter:image" content="<?php echo $facebook['imagem']; ?>">
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:image:height" content="630">
        <meta property="twitter:image:width" content="1200">

        <meta property="article:tag" content="quiz">
        <meta property="article:author" content="<?php echo Cliente::getCliente()->getPaginaDoFacebook(); ?>" />
        <meta property="article:publisher" content="<?php echo Cliente::getCliente()->getPaginaDoFacebook(); ?>" />

        <meta property="og:locale"   content="pt_BR" /> 

        <meta property="fb:admins" content="100001029155020" />
        <meta property="fb:app_id" content="<?php echo Cliente::getCliente()->getIdFacebook(); ?>" />

        <link rel="canonical" href="<?php echo $facebook['url']; ?>" />
        <link rel="image_src" href="<?php echo $facebook['imagem']; ?>" />

        <title><?php echo $titulo; ?></title>

        <link rel="stylesheet" href="<?php echo base_storage("web/css/foundation.css"); ?>" />
        <link rel="stylesheet" href="<?php echo base_url("storage/web/fonts/font.css"); ?>" />
        <link rel="stylesheet" type="text/less" href="<?php echo base_storage("web/css/style.css"); ?>" />
        <?php if(Cliente::getCliente()->getBotaoFixo()){ ?>
        <link rel="stylesheet" type="text/less" href="<?php echo base_storage("web/css/fixo.css"); ?>" />
        <?php } ?>
     
        <script type="text/javascript">
            var BASE_URL = '<?php echo base_url(); ?>';
            var BASE_STORAGE = '<?php echo base_storage(); ?>';
        </script>

        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.min.js"></script>

    </head>
    <body>


        <div id="fb-root"></div>


        <script>

            function createCookie(name, value, days) {
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    var expires = "; expires=" + date.toGMTString();
                } else
                    var expires = "";
                document.cookie = name + "=" + value + expires + "; path=/";
            }

            function readCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ')
                        c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0)
                        return c.substring(nameEQ.length, c.length);
                }
                return null;
            }
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '<?php echo Cliente::getCliente()->getIdFacebook(); ?>',
                    xfbml: true,
                    version: 'v2.3'
                });


                if (readCookie('imagem') != null) {
                    $(".usuario").css({"display": "table"});
                    $(".usuario img").attr({"src": readCookie('imagem')});
                } else {
                    FB.getLoginStatus(function (response) {
                        if (response.status === 'connected') {

                            FB.api('/me?fields=picture.height(200){url}', function (data) {
                                console.log(data);
                                createCookie("imagem", data.picture.data.url, 30);
                                $(".usuario").css({"display": "table"});
                                $(".usuario img").attr({"src": readCookie('imagem')});
                                $("#fazerlogin").css({"display": "none"});
                            });
                        }
                    });
                    $("#fazerlogin").css({"display": "table"});
                }
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
        <?php if ($_SERVER['SERVER_ADDR'] == '127.0.0.1') { ?>
            <div style="width: 100%; height: 10px; background-color: #e6db55; display: block;"></div>
        <?php } ?>
        <header>

            <div class="row column">
                <h1 class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_storage("web/".Cliente::getCliente()->getNome()."/img/logo.png"); ?>" alt="logo" /></a></h1>

                <div class="facebook show-for-large">
                    <div class="fb-like" data-href="<?php echo Cliente::getCliente()->getPaginaDoFacebook(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
                </div>

                <div class="facebook show-for-small-only">
                    <div class="fb-like" data-href="<?php echo Cliente::getCliente()->getPaginaDoFacebook(); ?>" data-width="100%" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
                </div>


                <ul id="menu" class="show-for-medium">
                    <li><a href="<?php echo base_url(); ?>"<?php if ($tipo == 'home') { ?> class="active"<?php } ?>>Home</a></li>
                    <li><a href="<?php echo base_url("contato/"); ?>">Contato</a></li>
                </ul>
                <a href="javascript:abre_menu();" class="icon-menu show-for-small-only" id="abre-menu"><img src="<?php echo base_storage("web/img/icon-menu.png"); ?>" alt="menu" /></a>

                <a class="login button show-for-medium" id="fazerlogin" onclick="FB.login(function (response) {
                            FB.api('/me?fields=picture.height(200){url}', function (data) {
                                console.log(data);
                                createCookie('imagem', data.picture.data.url, 30);
                                $('.usuario').css({'display': 'table'});
                                $('.usuario img').attr({'src': readCookie('imagem')});
                                $('#fazerlogin').css({'display': 'none'});
                            });
                        }, {scope: 'public_profile, email, user_friends'});" href="#">Fazer login</a>
                <figure class="usuario show-for-large"><img src="" /></figure>
            </div>
        </header>

        <div id="menu-mobile">
            <a href="javascript:fecha_menu();" class="close"><img src="<?php echo base_storage("web/img/close.png"); ?>" alt="fechar" /></a>
            <ul id="menu-lista">
                <li><a href="<?php echo base_url(); ?>"<?php if ($tipo == 'home') { ?> class="active"<?php } ?>>Home</a></li>
                <li><a href="<?php echo base_url(); ?>contato/"<?php if ($tipo == 'contato') { ?> class="active"<?php } ?>>Contato</a></li>
            </ul>
        </div>