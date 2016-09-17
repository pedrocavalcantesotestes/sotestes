<?php

define("STORAGE_LOCAL", $_SERVER['DOCUMENT_ROOT'] . "/storage/");

define("CACHE", $_SERVER['DOCUMENT_ROOT'] . "/cache/");
define("FONTS", $_SERVER['DOCUMENT_ROOT'] . "/fonts/");

use Aws\S3\S3Client;
require_once FCPATH . "application/libraries/aws/aws-autoloader.php";

class Nuvem {
    public static $s3 = null;
   
}

Nuvem::$s3= S3Client::factory(array(
            'region' => 'us-east-1',
            "version" => "latest",
            'credentials' => array(
                'key' => AWSID,
                'secret' => AWSSECRET, 
            ),
            "http" => array(
                "verify" => false
        )));
Nuvem::$s3->registerStreamWrapper();
