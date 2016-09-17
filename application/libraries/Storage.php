<?php

class Storage {

    public static function getURL($uri = '') {
        return Cliente::getCliente()->getS3($uri);
    }

    public static function putS3($filename, $data) {
        file_put_contents($filename, $data, 0, stream_context_create(array(
            's3' => array(
                'ACL' => 'public-read',
                "StorageClass" => 'REDUCED_REDUNDANCY'
            )
        )));
    }

    public static function getS3($filename) {
        $file = str_replace(STORAGE_ONLINE, STORAGE_LOCAL, $filename);
        if (!file_exists($file)) {
            if (file_exists($filename)) {
                Storage::forceFilePutContents($file, file_get_contents($filename));
            } else {
                return FALSE;
            }
        }
        $retorno = file_get_contents($file);
        if(strpos($file, 'resultado'))
            unlink($file);
        return $retorno;
    }

    public static function forceFilePutContents($filepath, $message) {
        try {
            $isInFolder = preg_match("/^(.*)\/([^\/]+)$/", $filepath, $filepathMatches);
            if ($isInFolder) {
                $folderName = $filepathMatches[1];
                $fileName = $filepathMatches[2];
                if (!is_dir($folderName)) {
                    mkdir($folderName, 0777, true);
                }
            }
            file_put_contents($filepath, $message);
        } catch (Exception $e) {
            echo "ERR: error writing '$message' to '$filepath', " . $e->getMessage();
        }
    }

}
