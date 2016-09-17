<?php

class Ca {

    public function sendCache() {
        $send = time();
        file_put_contents(STORAGE_ONLINE . "cache.json", $send);
    }

    private function atualizaCache() {
        Nuvem::$s3->downloadBucket($_SERVER['DOCUMENT_ROOT'] . "/storage/aplicativo/", STORAGE_ONLINE . 'aplicativo/');
    }

    public function cacheStatus() {
        if (file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/cache.json") != file_get_contents(STORAGE_ONLINE . "cache.json")) {
            $this->limpaStorage();
            $this->atualizaCache();
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/cache.json", file_get_contents(STORAGE_ONLINE . "cache.json"));
        }
    }

    private function limpaStorage() {
        @rmdir_recursive($_SERVER['DOCUMENT_ROOT'] . "/storage/aplicativo/");
        @mkdir($_SERVER['DOCUMENT_ROOT'] . "/storage/aplicativo/"); 
        @mkdir($_SERVER['DOCUMENT_ROOT'] . "/storage/aplicativo/".Cliente::getCliente()->getNome()."/"); 
        $this->atualizaCache();
    }

}

function rmdir_recursive($dir) {
    if (is_dir($dir)) {
        foreach (scandir($dir) as $file) {
            if ('.' === $file || '..' === $file)
                continue;
            if (is_dir("$dir/$file"))
                rmdir_recursive("$dir/$file");
            else
                unlink("$dir/$file");
        }
    }
    rmdir($dir);
}
