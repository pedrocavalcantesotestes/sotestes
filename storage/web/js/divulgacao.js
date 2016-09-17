function divulgar(idApp) {
    var horario = null;
    if (confirm("Deseja agendar essa publicação?")) {
        horario = prompt("Digite data/hora da publicação", new Date().getFullYear() + "-" + (new Date().getMonth() + 1) + "-" + new Date().getDate() + " HORA:MINUTO");
        if (horario == "" || horario == null) {
            horario = null;
        }
    }

    if (confirm("Tem certeza que deseja divulgar esse aplicativo?")) {
        jQuery.ajaxSetup({async: false});
        var pagina = null;
        FB.login(function (response) {
            if (response.authResponse) {
                $.get("/divulgar/getpaginas", function (retorno) {

                    for (var i = 0; i < retorno.length; i++) {
                        pagina = retorno[i];


                        FB.api('/' + pagina.id + '?fields=picture.height(1000),name,id,access_token', function (page) {

           
                     

                            var aplicativo = getAplicativo(idApp);
                            page.gender = pagina.sexo;

                            var paginaRand = retorno[_.random(0, retorno.length - 1)];
                            FB.api('/' + paginaRand.id + '?fields=picture.height(1000),name,id,access_token', function (rtn) {
                                var amigo;
                                amigo = rtn;
                   
                                amigo.gender = paginaRand.sexo;
                                page.friends = {data: [amigo]};

                                var resultado = getResultado(page, idApp, amigo.id);

                              FB.api(
                                        "/" + page.id + "/feed",
                                        "POST",
                                        {
                                            message: aplicativo.titulo,
                                            link: resultado.url,
                                            access_token: page.access_token,
                                            published: (horario == null ? true : false),
                                            scheduled_publish_time: (horario == null ? null : Date.parse(horario) / 1000)

                                        },
                                        function (response) {
                                            console.log(response);
                                            if (response && !response.error) {
                                                $("#infos").append("<p>Inserido com sucesso em: " + page.name + "</p>\n");


                                            } else {
                                                console.log(response);
                                                $("#infos").append("<p>Ocorreu o seguinte erro:" + JSON.stringify(response) + "</p>\n");
                                            }
                                        }
                                ); 


                            });

                           
                        });



                    }
                });
            }
        }, {scope: 'pages_show_list, publish_actions, publish_pages'});
    }

}




function getAplicativo(idApp) {

    var retornar;
    $.get("/divulgar/getaplicativo/" + idApp, function (retorno) {
        retornar = retorno;
    });
    return retornar;
}

function getResultado(usuario, idApp, amigo) {
    var retornar;

    $.ajax({
        url: '/gerar/' + idApp,
        type: 'POST',
        data: {
            'usuario': JSON.stringify(usuario),
            'amigo': amigo,
            'amigo2': "436170383205268",
            'amigo3': "317757375085469",
            'amigo4': "779065448848242",
            'amigo5': "900191670025719",
        },
       success:function(result) {
        retornar = result;
       }
    });

    return retornar;


}