<?php 
session_start();
 // Система изменения тайтла в зависимости от страницы
if(!empty($_SESSION['page_url']) && !empty($_SESSION['page_title'])){
  $titles = array('index.php' => 'Главная страница',
                  'regform.php' => 'Регистрация на сайте',
                  'loginform.php' => 'Вход на сайт', 
                  'page.php?url='.$_SESSION['page_url'] => 'Страница - '.$_SESSION['page_title'],
                  'page.php?url=' => 'Страница - '.$_SESSION['page_title'],
                  'page.php' => $_SESSION['page_title']
  );
}else{
  $titles = array('index.php' => 'Главная страница',
                  'regform.php' => 'Регистрация на сайте',
                  'loginform.php' => 'Вход на сайт');
}
$url = $_SERVER['REQUEST_URI']; // Получаем юрл на котором щас
$url = explode('/', $url); // Разделяем всё
$url = array_pop($url); // Получаем только сам файл (имя)
if(isset($titles[$url])){ // Проверка если в массиве есть такой файл то устанавливаем, если нет то устанавливаем стандартое значение
  $title = $titles[$url];
}else{
  $title = 'CMS - Страница';
}
?>
<!DOCTYPE html>
<html lang="ru" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link href="./boos/bootstrap.min.css" rel="stylesheet">
    <script src="./boos/bootstrap.bundle.min.js"></script>
    <style>
    pre {
        overflow: visible;
    }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">CMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <?php 
          require_once 'template/cfg.php';
          $q = 'SELECT * FROM `menu` WHERE `parent_id` = 0 ORDER BY `sort` ';
          $res = mysqli_query($link, $q);
          $menu = mysqli_fetch_all($res, MYSQLI_ASSOC);
          foreach ($menu as $key) {
            $q = 'SELECT * FROM `menu` WHERE `parent_id` = '.$key['id'].' ';
            $res = mysqli_query($link,$q);
            $sub_menu = mysqli_fetch_all($res, MYSQLI_ASSOC);
            if(!empty($sub_menu)){
              echo ' <li class="nav-item dropdown">  
            <a class="nav-link dropdown-toggle" href="'.$key['href'].'" data-bs-toggle="dropdown">'.$key['title'].'</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownXxl">';
            foreach($sub_menu as $sm){
              echo '<li class="nav-item"><a class="nav-link" style="color:black;" aria-current="page" href="'.$sm['href'].'">'.$sm['title'].'</a></li>';
            }
           echo ' </ul>
          </li>';


            }else{
            echo '<li class="nav-item">
            <a class="nav-link" aria-current="page" href="'.$key['href'].'">'.$key['title'].'</a>
          </li>';
            }
          }
          ?>
                </ul>
            </div>
            <?php 
        require_once "template/functions.php";
        if (!empty($_SESSION['login'])){
          $logintext = $_SESSION['login'].' (Выйти)';
          if($_SESSION['admin'] != 0){
            $logintext2 = '<a href="admin/index.php" class="navbar-brand">Войти в админку</a>';
          }else{
            $logintext2 = '';
          }
        }else{
          $logintext = '';
        }
      ?>
            <a class="navbar-brand" href="./exit.php"><?=$logintext?></a><?=$logintext2?>
        </div>
    </nav>