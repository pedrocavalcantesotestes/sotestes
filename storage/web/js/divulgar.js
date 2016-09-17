//
//function get_link_signo(nome_da_pagina, _id) {
//    var atual, code, json;
//    var paginas = [
//        ["Câncer", BASE_URL + "storage/web/img/paginas/cancer.png"],
//        ["Libra", BASE_URL + "storage/web/img/paginas/libra.png"],
//        ["Virgem", BASE_URL + "storage/web/img/paginas/virgem.png"],
//        ["Peixes", BASE_URL + "storage/web/img/paginas/peixes.png"],
//        ["Gêmeos", BASE_URL + "storage/web/img/paginas/gemeos.png"],
//        ["Sagitário", BASE_URL + "storage/web/img/paginas/sagitario.png"],
//        ["Leão", BASE_URL + "storage/web/img/paginas/leao.png"],
//        ["Áries", BASE_URL + "storage/web/img/paginas/aries.png"],
//        ["Touro", BASE_URL + "storage/web/img/paginas/touro.png"],
//        ["Aquário", BASE_URL + "storage/web/img/paginas/aquario.png"],
//        ["Capricórnio", BASE_URL + "storage/web/img/paginas/capricornio.png"],
//        ["Escorpião", BASE_URL + "storage/web/img/paginas/escorpiao.png"],
//        ["AppJoy", BASE_URL + "storage/web/img/paginas/appjoy.png"]
//    ];
//
//
//
//    var migos = {};
//
//    for (var i = 0; i < paginas.length; i++) {
//        migos[i] = {
//            name: paginas[i][0],
//            gender: "male",
//            picture: {
//                data: {
//                    url: paginas[i][1]
//                }
//            }
//        };
//    }
//
//    for (var i = 0; i < paginas.length; i++) {
//        atual = paginas[i];
//        if (nome_da_pagina.indexOf(atual[0]) != -1) {
//
//            code = '{ "id": "1044239242287038", "name": "' + atual[0] + '", "email": "fabricio.jhonata@gmail.com", "picture": { "data": { "url": "' + atual[1] + '" } }, "gender": "female", "age_range": { "max": 20, "min": 18 }, "friends": { "data": [{ "name": "Câncer", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xaf1/v/t1.0-9/11703122_379750828886123_8831189141759240703_n.png?oh=1671e77d917f81e57f688a2e7dd26e1e&oe=57719AB9" } } }, { "name": "Libra", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xtf1/v/t1.0-9/11698632_522030957952543_66888935285273557_n.png?oh=ec91cf3955863600ede4e5d72a5895d8&oe=572FCCB6" } } }, { "name": "Virgem", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xfa1/v/t1.0-9/11755137_1590844444512835_2632737855985049090_n.png?oh=20b378b728b6101e144996a407a0ab4f&oe=572ECE1B" } } }, { "name": "Peixes", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xpa1/v/t1.0-9/1499540_776789075753129_6806017074377165889_n.png?oh=8a259fb611b71d810724ac2ad777f7f3&oe=57278163" } } }, { "name": "Gêmeos", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xaf1/v/t1.0-9/11760222_1619598314975587_6763040518143120843_n.png?oh=5283f22e3d029d4f20af5d536e71e6a3&oe=573B8377" } } }, { "name": "Sagitário", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xlf1/v/t1.0-9/11745616_870960042992115_7870132816023202778_n.png?oh=4ebd27a39df5da51ffc11daaea2bb905&oe=57400F07" } } }, { "name": "Leão", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xpl1/v/t1.0-9/11745602_998616153516603_2063837028160964219_n.png?oh=a4617b1e58059c52eec897cfc1b81cfc&oe=57353DCD" } } }, { "name": "Áries", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xtf1/v/t1.0-9/11204450_1616854178575779_8375725519812605659_n.png?oh=a0852b4ba9a4bc96352b702c810414ef&oe=5725906E" } } }, { "name": "Touro", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xpa1/v/t1.0-9/11222904_1698836780346074_2481189627109127707_n.png?oh=23fac122c53a37b26cb17809593037c8&oe=572C50D8" } } }, { "name": "Aquário", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xpl1/v/t1.0-9/11745822_710600789085993_808914814865900792_n.png?oh=6b94a12605e1a57ca18395340446211d&oe=57240384" } } }, { "name": "Capricórnio", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xfp1/v/t1.0-9/11745453_469526829876187_8866384836268980183_n.png?oh=18c65efa4f72ab803e28a4626421cc08&oe=57365606" } } }, { "name": "Escorpião", "gender": "male", "picture": { "data": { "url": "https://scontent.frao1-1.fna.fbcdn.net/hphotos-xap1/v/t1.0-9/11202860_1079789598717108_6533744607815079325_n.png?oh=eaa31b525a145b0cebf6b6e733d2a353&oe=57391876" } } }] } }';
//
//            json = JSON.stringify(JSON.parse(code));
//            var url;
//            $.ajax({
//                method: "POST",
//                async: false,
//                data: {usuario: json, nome_gerar: atual[0]},
//                url: "/gerar/" + _id
//            }).done(function (status) {
//                url = status.url;
//            });
//
//            return url;
//        }
//    }
//}
//
//
//
//function agendar(_id, msg, data) {
//    var d = new Date(data);
//
//    var paginas = [
//        436170383205268,
//        317757375085469,
//        779065448848242,
//        900191670025719,
//        394278487401022,
//        975557249140344,
//        605936909552382,
//        1618167971746289,
//        1543891959205335,
//        695218313910206,
//        1540009772934442,
//        1522821737981773,
//        1535637430062984
//    ];
//
//    FB.login(function () {
//
//        FB.api('/me/accounts?limit=1000', function (contas) {
//            var atual;
//            var link;
//            var ids = [];
//            for (var i = 0; i < contas.data.length; i++) {
//                atual = contas.data[i];
//                if (paginas.indexOf(parseInt(atual.id)) != -1) {
//                    ids.push(atual);
//                }
//            }
//
//            agenda_send(_id, msg, ids, 0, Date.parse(data));
//        });
//
//    }, {scope: 'publish_actions, manage_pages, publish_pages, publish_actions'});
//}
//
//function agenda_send(_id, _msg, _contas, _x, _datetime) {
//    if (_contas.length > _x) {
//        var atual = _contas[_x];
//        var url = get_link_signo(atual.name, _id);
//
//        FB.api(
//                "/" + atual.id + "/feed",
//                "POST",
//                {
//                    message: _msg,
//                    link: url,
//                    access_token: atual.access_token,
//                    scheduled_publish_time: (_datetime / 1000),
//                    published: false
//                },
//                function (response) {
//                    if (response && !response.error) {
//                        console.log("Inserido com sucesso em: " + atual.name + "\n");
//                        _x++;
//                        agenda_send(_id, _msg, _contas, _x, _datetime);
//                    } else {
//                        console.log(response.error.message);
//                        console.log("Erro ao inserir em: " + atual.name + " Vamos tentar novamente!\n");
//                        setTimeout(function () {
//                            agenda_send(_id, _msg, _contas, _x, _datetime);
//                        }, 7000);
//                    }
//                }
//        );
//
//    }
//}