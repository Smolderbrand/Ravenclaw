<?php
	$dbhost = "localhost";
	$dbuser = "chindea";
	$dbpass = "TdozPhcSYbgx2";
	$dbname = "ravenclaw";
	if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
		die("Failed to connect!");
	}
?>
