$(document).foundation();
var variacao;
var amigo = [];
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

        $("#votos_count_1").hide();
        $("#votos_count_2").hide();
        $("#votar1").hide();
        $("#votar2").hide();
        $("#javotou").hide();

        login($(this).attr("data-id"), $(this).attr("data-tipo"));
        return false;
    });

    $(".share").click(function () {
        console.log($(this).attr("data-href"));
        compartilhar($(this).attr("data-href"));
        return false;
    });

    home();
    contato();
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
        $(".pubhide").hide(0);
        $(".pubshow").show(0);
        if (tipo == 'padrao') {
            var query = "/me?fields=id,name,email,picture.height(1000){url},gender,age_range";
        } else {
            var query = "/me?fields=id,name,email,picture.height(1000){url},gender,age_range,friends.limit(6000){id,name,picture.height(300).width(300),gender}";
        }
        if (fecharAmigo) {
            $("#amigos").hide(0);
        }
        FB.api(query, function (data) {

            if (tipo == 'escolherAmigo' && amigo[0] == null) {
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
                    amigo[0] = $(this).attr("data-amigo");
                    amigo[1] = "499717083554615";
                    amigo[2] = "499717083554615";
                    amigo[3] = "499717083554615";
                    amigo[4] = "499717083554615";
                    login(nameID, tipo);
                });
                fecharAmigo = true;
                return false;
            } else if (tipo == 'escolherAmigoRand' && amigo[0] == null) {
                var lista_amigos = [];
                for (var i = 0; i < data.friends.data.length; i++) {
                    lista_amigos[i] = data.friends.data[i].id;
                }

                $(".displayappbt").hide(0);
                $("#displaycarregador").fadeOut(0);

                var ia = 0;
                var new_list = [];
                while (lista_amigos.length != 0) {
                    var index = Math.floor(Math.random()*lista_amigos.length);
                    var picked = lista_amigos[index];
                    new_list[ia] = picked;
                    lista_amigos.splice(index, 1);  // This removes the picked element from the array
                    ia++;
                }

                amigo = new_list;
                if (typeof amigo[0] == 'undefined')
                    amigo[0] = "499717083554615";
                if (typeof amigo[1] == 'undefined')
                    amigo[1] = "499717083554615";
                if (typeof amigo[2] == 'undefined')
                    amigo[2] = "499717083554615";
                if (typeof amigo[3] == 'undefined')
                    amigo[3] = "499717083554615";
                if (typeof amigo[4] == 'undefined')
                    amigo[4] = "499717083554615";

                login(nameID, tipo);
            }

            $.post("/gerar/" + nameID, {usuario: JSON.stringify(data), amigo: amigo[0], amigo2: amigo[1], amigo3: amigo[2], amigo4: amigo[3], amigo5: amigo[4]}, function (retorno) {
                ga('send', 'event', 'Resultado', 'gerar', {
                    hitCallback: function () {

                    }
                });
                createCookie("acessar_" + retorno.id, "sim", 10);
                window.location.href = retorno.url;


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
        href: _url,
        display: 'popup'
    }, function (response) {
        if (response && !response.error_message) {
            window.location = BASE_URL + 'destaques/';
            ga('send', 'event', 'Resultado', 'share');
        } else {
            // erro ao postar
        }
    });
}

var page = 0;

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
var fora;
var fim = "nao";
var liberado = true;
function home() {
    var win = $(window);


    win.scroll(function () {

        if (($(document).height() - (win.height()) == win.scrollTop()) && fim == "nao" && liberado == true) {

            liberado == false;
            fora = false;

            var topo = win.scrollTop() + 100;
            $("#carregador-load").fadeIn("fast", function () {
                if(fora == false) {
                    fora = true;
                    page++;
                    console.log("Page: " + page);
                $.ajax({
                    url: '/home/get/' + page,
                    dataType: 'json',
                    success: function (apps) {
                        console.log("Fim: " + fim);
                        if (apps.length <= 0) {
                            fim = "sim";
                            $("#carregador-load").fadeOut("fast");
                        } else {

                            $("#carregador-load").fadeOut("fast", function () {
                                console.log("Results: " + apps.length);
                                    for (var i = 0; i < apps.length; i++) {
                                        var app = apps[i];

                                        var html = '<div class="column"> <div class="item"> <a href="' + app.url + '"> <figure><img src="' + app.imagem + '" alt="' + app.titulo + '" /></figure> <h3>' + app.titulo + '</h3> <small>clique e descubra!</small> </a> </div> </div>';
                                        $("#home").append(html);
                                        if((i + 1) == apps.length)
                                            liberado = true;
                                    }
                            });
                        }

                    }
                });
                }
            });

        }
    });


}

$.validateEmail = function (email)
{
    er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec(email))
        return true;
    else
        return false;
};
var key = Math.random() * 100;
function contato() {
    $("#form-contato").submit(function () {

        if ($("#form-contato input[name='nome']").val() == '') {
            alert("Preencha seu nome corretamente!");
            return false;
        }

        if ($("#form-contato input[name='email']").val() == '' || !$.validateEmail($("#form-contato input[name='email']").val())) {
            alert("Preencha seu e-mail corretamente!");
            return false;

        }

        if ($("#form-contato select[name='assunto'] option:selected").val() == 'nulo') {
            alert("Selecione um assunto");
            return false;

        }

        if ($("#form-contato textarea[name='mensagem']").val() == '') {
            alert("Digite sua mensagem!");
            return false;
        }

        $("#form-contato").fadeOut(0);
        $("#enviadomsg").fadeIn(0);

        $.post(BASE_URL + "contato/enviar", {
            nome: $("#form-contato input[name='nome']").val(),
            email: $("#form-contato input[name='email']").val(),
            assunto: $("#form-contato select[name='assunto'] option:selected").val(),
            mensagem: $("#form-contato textarea[name='mensagem']").val()
        }, function (response) {
            if (response.sucesso == "sim") {
                alert("Enviado com sucesso!");

             
            }else{
                alert("Ocorreu um erro, tente novamente!");
            }
            
               $("#form-contato input[name='nome']").val('');
                $("#form-contato input[name='email']").val('');

                $("#form-contato textarea[name='mensagem']").val('');
                $("#enviadomsg").fadeOut(0);
                $("#form-contato").fadeIn(0);
        });



        return false;
    });
}