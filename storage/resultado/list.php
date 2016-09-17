<?php
    // atribuição a variável $dir
   $dir = new DirectoryIterator( './' );
 
   // atribui o valor de $dir para $file em loop 
   foreach($dir as $file )
   {
     // verifica se o valor de $file é diferente de '.' ou '..'
     // e é um diretório (isDir)
     if (!$file->isDot() && $file->isDir())
     {
	// atribuição a variável $dname
        $dname = $file->getFilename();
 
        // imprime o nome do diretório
        echo $dname."<br>";
     }
   }
?>