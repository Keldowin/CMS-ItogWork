<?php 
session_start();
require_once '../../template/functions.php';
require_once '../../template/cfg.php';

$id = isset($_GET['id']) ? $_GET['id'] : exit('Ошибка | Отсуствует id');

//Удаление коментов
$q = 'DELETE FROM `users` WHERE `id` = '.$id.'';
$res = mysqli_query($link,$q);
if($res){
    $success[] = 'Пользователь удалён';
}else{
    $errors[] = 'Ошибка, пользователь не удалён';
}
$_SESSION['errors'] = $errors;
$_SESSION['success'] = $success;
header_safe('../users.php');
?>