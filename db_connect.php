<?php 
define('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASSWORD','root');
define('DB_NAME','stocks');

$mysqli=@new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if ($mysqli->connect_errno) exit ('Error');
$mysqli->set_charset('utf8');

?>