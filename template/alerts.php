<?php
// Локальный алерт
function alerts($type, $title){
    echo '<div class="card container mt3 mb-5 mt-1 alert alert-'.$type.' alert-dismissible fade show" role="alert">
    '.$title.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }

// Глобальный алерт
function alert($type, $array){
  foreach($array as $a){
    echo '<div class="card container mt3 mb-5 mt-1 alert alert-'.$type.' alert-dismissible fade show" role="alert">
      '.$a.'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
}

$error = array('Заполнены не все поля формы','Неверные логин или пароль','Пользователь с таким логином уже существует','Один из полей с паролем не верны','Человека с таким логином и паролем не существует');
?>