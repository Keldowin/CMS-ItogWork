<?php 
$link = mysqli_connect('localhost', 'cj24332_kripto', 'h7QKn8KJ', 'cj24332_kripto');
if(!$link){
	exit("Ошибка бд");
}

define('UPLOAD_DIR','files');
define('UPLOAD_PATH', dirname(__DIR__).DIRECTORY_SEPARATOR.UPLOAD_DIR.DIRECTORY_SEPARATOR);
?>