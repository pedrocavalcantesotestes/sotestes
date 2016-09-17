<section id="content-site">
    <div class="container">

    <ul id="paginacao">
        <?php if($_GET['page'] > 0){ ?>
        <li class="anterior"><a href="?page=<?php echo $_GET['page']-1; ?>"><?php echo locate("Anterior"); ?></a></li>
        <?php } if($_GET['page'] < $max){ ?>
        <li class="proximo"><a href="?page=<?php echo $_GET['page']+1; ?>"><?php echo locate("Próximo"); ?></a></li>
        <?php } ?>
    </ul>

        <article class="last-update box-padrao">                
            <div class="galeria-aplicativos">               
                <?php foreach ($aplicativos as $row) { ?>
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
            </div>
        </article>
    
    <ul id="paginacao">
     <?php if($_GET['page'] > 0){ ?>
        <li class="anterior"><a href="?page=<?php echo $_GET['page']-1; ?>"><?php echo locate("Anterior"); ?></a></li>
        <?php } ?>
        <?php if($_GET['page'] < $max){ ?>
        <li class="proximo"><a href="?page=<?php echo $_GET['page']+1; ?>"><?php echo locate("Próximo"); ?></a></li>
        <?php } ?>
       
    </ul>

   <!--/container-->
</section>
<!--/content-site-->