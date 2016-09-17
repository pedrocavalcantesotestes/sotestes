$(document).foundation();
var variacao;
var amigo = null;
function setVariacao() {
    if ($(window).width() >= 992) {
        variacao = 5;
    } else if ($(window).width() > 638) {
        variacao = 6;
    } else {
        variacao = 2;
    }

    var c = 1;
    $("#amigos .row .item-amigo").not(".fechado").each(function () {
        if ((c++ % variacao) == 1) {
            $(this).css({"clear": "left"});
        } else {
            $(this).css({"clear": "none"});
        }

    });
}
function stripVowelAccent(str)
{
    var rExps = [
        {re: /[\xC0-\xC6]/g, ch: 'A'},
        {re: /[\xE0-\xE6]/g, ch: 'a'},
        {re: /[\xC8-\xCB]/g, ch: 'E'},
        {re: /[\xE8-\xEB]/g, ch: 'e'},
        {re: /[\xCC-\xCF]/g, ch: 'I'},
        {re: /[\xEC-\xEF]/g, ch: 'i'},
        {re: /[\xD2-\xD6]/g, ch: 'O'},
        {re: /[\xF2-\xF6]/g, ch: 'o'},
        {re: /[\xD9-\xDC]/g, ch: 'U'},
        {re: /[\xF9-\xFC]/g, ch: 'u'},
        {re: /[\xD1]/g, ch: 'N'},
        {re: /[\xF1]/g, ch: 'n'}];

    for (var i = 0, len = rExps.length; i < len; i++)
        str = str.replace(rExps[i].re, rExps[i].ch);

    return str;
}
function buscaAmigo() {
    setVariacao();
    var setTime;
    $('input#searchAmigo').keyup(function () {
        clearTimeout(setTime);
        console.log("oi\n");
        var ele = $(this);
        setTime = setTimeout(function () {
            var filter = stripVowelAccent(ele.val());
            $("#amigos .row .item-amigo").each(function () {
                if (stripVowelAccent($(".cont span", this).html()).search(new RegExp(filter, "i")) < 0) {
                    $(this).hide(0);
                    $(this).addClass("fechado");
                } else {
                    $(this).show(0);
                    $(this).removeClass("fechado");
                    $(this).removeAttr("style");
                }
            });
            var c = 1;
            $("#amigos .row .item-amigo").not(".fechado").each(function () {
                if ((c++ % variacao) == 1) {
                    $(this).css({"clear": "left"});
                } else {
                    $(this).css({"clear": "none"});
                }

            });
        }, 300);
    });


}
$(window).resize(function () {
    setVariacao();
});
$(document).ready(function () {

    $(".gerarResultado").click(function () {
        login($(this).attr("data-id"), $(this).attr("data-tipo"));
        return false;
    });

    $(".share").click(function () {
        console.log($(this).attr("data-href"));
        compartilhar($(this).attr("data-href"));
        return false;
    });

    home();
});

var createCookie = function (name, value, days) {
    var expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}
var fecharAmigo = false;
var amigosDown = false;

function login(nameID, tipo) {
    $("body").scrollTop(0);
    var api = function () {

        $(".displayapp").fadeOut(0);
        $(".displayappbt").fadeOut(0);
        $(".displayresbt").attr({"style": "display: none !important"});
        $("#displaycarregador").fadeIn("fast");
        $("#carregapub").fadeIn(0);
        $("#paginapub, .pubhide").fadeOut(0);
        if (tipo == 'padrao') {
            var query = "/me?fields=id,name,email,picture.height(1000){url},gender,age_range";
        } else {
            var query = "/me?fields=id,name,email,picture.height(1000){url},gender,age_range,friends.limit(6000){id,name,picture.height(300).width(300),gender}";
        }
        if (fecharAmigo) {
            $("#amigos").hide(0);
        }
        FB.api(query, function (data) {

            if (tipo == 'escolherAmigo' && amigo == null) {
                if (!amigosDown) {
                    var htmlAmigo = '';
                    for (var i = 0; i < data.friends.data.length; i++) {
                        htmlAmigo = '<div class="column item-amigo" data-amigo="' + data.friends.data[i].id + '"> <div class="cont"> <img src="' + data.friends.data[i].picture.data.url + '" alt="imagem"> <span>' + data.friends.data[i].name + '</span> </div> </div>';
                        $("#amigos .row").append(htmlAmigo);
                    }
                }
                amigosDown = true;

                buscaAmigo();
                $("#amigos").fadeIn("fast");

                $(".displayappbt").hide(0);

                $("#displaycarregador").fadeOut(0);
                $("#amigos .row .item-amigo").click(function () {
                    amigo = $(this).attr("data-amigo");
                    login(nameID, tipo);
                });
                fecharAmigo = true;
                return false;
            }


            $.post("/gerar/" + nameID, {usuario: JSON.stringify(data), amigo: amigo}, function (retorno) {
                window.history.pushState('resultado', retorno.titulo, retorno.url);
                amigo = null;
                fecharAmigo = false;
                ga('send', {
                    hitType: 'pageview',
                    location: retorno.url,
                    title: retorno.titulo
                });

                $(".share").attr({"data-href": retorno.url});
                $("#tituloapp").html(retorno.titulo);
                $("#textoapp").html(retorno.texto);
                $("#imagemapp").attr({"src": ""});
                $("#imagemapp").attr({"src": retorno.imagem});

                $(".displayappbt").hide(0);
                $(".displayresbt").attr({"style": "display: block !important"});
                $(".displayapp").fadeIn();
                $("#displaycarregador").fadeOut(0);

                $("#figureapp a").attr({"href": 'javascript:compartilhar("' + retorno.url + '");'});

                if (readCookie('imagem') == null) {
                    createCookie("imagem", data.picture.data.url, 30);
                    $(".usuario").css({"display": "table"});
                    $(".usuario img").attr({"src": readCookie('imagem')});
                    $("#fazerlogin").css({"display": "none"});
                }

            });
        });
    }
    FB.getLoginStatus(function (response) {
        if (response.status === 'connected') {
            api();
        } else {
            FB.login(function (response) {
                if (response.status === 'connected') {
                    api();
                }
            }
            , {scope: 'public_profile, email, user_friends'});
        }
    });
}

function abre_menu() {
    $("#menu-mobile").fadeIn("fast");
}

function fecha_menu() {
    $("#menu-mobile").fadeOut("fast");
}

function compartilhar(_url) {
    FB.ui({
        method: 'share',
        href: _url
    }, function (response) {
        if (response && !response.error_message) {
            // postado
        } else {
            // erro ao postar
        }
    });
}

var page = 1;

var box_tam = 0;
function configura_home() {
//    $("#home .column").each(function () {
//        if ($(".item", this).height() > box_tam) {
//            box_tam = $(this).height();
//        }
//      
//    });
//    $("#home .column .item").css({"height":box_tam+"px"});

}
function home() {
    var win = $(window);
    configura_home();
    // Each time the user scrolls
    win.scroll(function () {
        // End of the document reached?
        if ($(document).height() - (win.height()) == win.scrollTop()) {
            console.log("Carregando...");
            var topo = win.scrollTop() + 100;
            $("#carregador-load").fadeIn("fast", function () {
                $.ajax({
                    url: '/home/get/' + page,
                    dataType: 'json',
                    success: function (apps) {
                        page++;

                        $("#carregador-load").fadeOut("fast", function () {
                            for (var i = 0; i < apps.length; i++) {
                                var app = apps[i];
                                var html = '<div class="column"> <div class="item"> <a href="' + app.url + '"> <figure><img src="' + app.imagem + '" alt="' + app.titulo + '" /></figure> <h3>' + app.titulo + '</h3> <small>clique e descubra!</small> </a> </div> </div>';
                                $("#home").append(html);
                                configura_home();
                            }
                        });


                    }
                });
            });

        }
    });
}