<?php 
session_start();
require_once '../../template/cfg.php';

$name = isset($_GET['name']) ? $_GET['name'] : exit('Ошибка | Отсуствует name');
if(unlink(UPLOAD_PATH.$name)){
    $_SESSION['success'][] = 'Файл учпешно удалён';
}else{
    $_SESSION['errors'][] = 'Ошибка удаления';
}
header('Location: ../files.php');
?>