<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  // Система изменения тайтла в зависимости от страницы
  $titles = array('index.php' => 'Главная страница',
                  'comments.php' => 'Комментарии на сайте',
                  'menu.php' => 'Блок-элементы меню CMS', 
                  'users.php' => 'Пользователи CMS', 
                  'pages.php' => 'Страницы CMS',
                  'files.php' => 'Файлы CMS'
  );
  $url = $_SERVER['REQUEST_URI']; // Получаем юрл на котором щас
  $url = explode('/', $url); // Разделяем всё
  $url = array_pop($url); // Получаем только сам файл
  if(isset($titles[$url])){ // Проверка если в массиве есть такой файл то устанавливаем, если нет то устанавливаем стандартое значение
    $title = $titles[$url];
  }else{
    $title = 'CMS - Админка';
  }
  ?>
  <title><?=$title?></title>
  <link href="http://kripto.xd0.ru/cms/boos/bootstrap.min.css" rel="stylesheet">
  <script src="http://kripto.xd0.ru/cms/boos/bootstrap.bundle.min.js"></script>
</head>
<?php 
if(!empty($_SESSION['login'])){
  if($_SESSION['admin'] != 1){
    echo '<script>window.location.href = "http://kripto.xd0.ru/cms/regform.php"</script>';
  }
}else{
  echo '<script>window.location.href = "http://kripto.xd0.ru/cms/regform.php"</script>';
}

$domain = 'http://kripto.xd0.ru/cms/admin/';
?>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="../index.php">CMS - Админка</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=$domain?>index.php">Админка</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="<?=$domain?>pages.php">Страницы</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$domain?>comments.php">Комментарии</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$domain?>menu.php">Меню</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$domain?>users.php">Пользователи</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$domain?>files.php">Файлы</a>
          </li>
      </div>
  </div>
</nav>