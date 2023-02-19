<?php
require_once 'template/header.php';
if(empty($_SESSION['login'])){
  header_safe('regform.php');
}else{
  $login = $_SESSION['login'];
}
?>
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Профиль - <?= $login ?></h1>
    <h2>Привет! Ты на сайте Пети Иванова</h2>
  </div>
</main>
<?php
require 'template/footer.php';
?>