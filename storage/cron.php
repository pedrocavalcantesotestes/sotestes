<?php

	set_time_limit(0);

    // atribuição a variável $dir
   $dir = new DirectoryIterator( './resultado/' );
 
   // atribui o valor de $dir para $file em loop 
   foreach($dir as $file ) {
     // verifica se o valor de $file é diferente de '.' ou '..'
     // e é um diretório (isDir)
     if (!$file->isDot() && $file->isDir()) {
	// atribuição a variável $dname
        $dname = $file->getFilename();
 
        // imprime o nome do diretório
        echo "<br/><b>Diretório: ".$dname."</b><br/>";

		/*Listar arquivos inicio */
		$dir = './resultado/'.$dname;
		$files = scandir($dir);
		/*Listar arquivos Fim */

		foreach ($files as $file) {
			if($file != '.' && $file != '..') {
				//unlink('./resultado/'.$dname.'/'.$file);
				echo "Deletou:".$file."<br/>";
			}
		}

     }
   }

?>