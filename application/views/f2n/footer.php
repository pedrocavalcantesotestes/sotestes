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
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', '<?php echo Cliente::getCliente()->getGoogleAnalitycs(); ?>', 'auto');
    ga('send', 'pageview');
<?php if (strpos(Cliente::getCliente()->getNome(), "appjoy.me") === FALSE) { ?>
        ga('create', 'UA-78794442-4', 'auto', 'Clientes');
        ga('Clientes.send', 'pageview');
<?php } ?>

</script>

<script type="text/javascript" src="<?php echo base_storage("web/js/vendor/jquery.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_storage("web/js/vendor/what-input.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_storage("web/js/foundation.min.js"); ?>"></script>

<script type="text/javascript" src="<?php echo base_storage("web/js/app.js"); ?>"></script>

<script type="text/javascript" src="<?php echo base_storage("web/js/underscore-min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_storage("web/js/divulgacao.js"); ?>"></script>


</body>
</html>