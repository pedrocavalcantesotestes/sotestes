<?php

class Votos{

	public static function getVotos($person, $teste, $result) {
        $cache = new Ca();
        $cache->cacheStatus();
		if (is_dir(STORAGE_ONLINE . "votos/{$teste}/{$result}/{$person}/")) {

			$number = count(scandir(STORAGE_ONLINE . "votos/{$teste}/{$result}/{$person}/"));

		} else {
			$number = 0;
		}

		return $number;

	}

	public static function jaVotou($teste, $result) {
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR']) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}

		if (is_file(STORAGE_ONLINE . "votos/{$teste}/{$result}/1/".$ip) || is_file(STORAGE_ONLINE . "votos/{$teste}/{$result}/2/".$ip)) {
			$votou = true;
		} else {
			$votou = false;
		}

		return $votou;

	}

}

?>