<?php 
define('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASSWORD','root');
define('DB_NAME','stocks');

/*define('DB_HOST','localhost');
define('DB_USER', 'ictatjcu_stocks');
define('DB_PASSWORD','123zxc');
define('DB_NAME','ictatjcu_stocks');*/


$mysqli=@new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if ($mysqli->connect_errno) exit ('Error');
$mysqli->set_charset('utf8');

?>