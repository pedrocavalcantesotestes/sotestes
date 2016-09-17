<script>

    function publicar(_msg, nomeId) {
        if (_msg == '') {
            divulga(nomeId);
        } else {
            if (confirm(_msg)) {
                divulga(nomeId);
            }
        }
    }


    function popupCenter(url, title, w, h) {
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

        // Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
    }

    function divulga(nomeId) {
        divulgar(nomeId);
        $("#exampleModal1").foundation('open');
    }

</script>
<div class="row">

    <div class="reveal" id="exampleModal1" data-reveal>
        <h1>Divulgando, aguarde!</h1>
        <p class="lead">Informações</p>
        <div id="infos"></div>

    </div>

    <div style="float: left;">


    </div>
    <table class="stack" style="width: 100%;">
        <thead>
            <tr>

                <th>Titulo</th>
                <th width="150">Link</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (Aplicativo::getListaDeAplicativos(array(
                "limit"=>10000
            )) as $row) {
                ?>
                <tr>
                    <td><?php echo $row->getTitulo(); ?></td>
                    <td><a href="javascript:popupCenter('<?php echo $row->getURL(); ?>', 'Aplicativo', '800', '600');" class="button">Testar APP</a></td>
                    <td>


                        <span class="button success" onclick="publicar('<?php echo $row->getObs(); ?>', '<?php echo $row->getNameID(); ?>');">Divulgar</span>

                    </td>
                </tr>
            <?php } ?>


        </tbody>
    </table>
</div>