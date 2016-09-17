<?php
if(isset($_GET['cache'])){
	echo file_get_contents(__DIR__.'/cache.json');
	exit;
}
header("Location: /wp-admin/");