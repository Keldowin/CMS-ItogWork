<?php
require_once "template/header.php";

function cheak_session(){
    if(empty($_SESSION['password1']) || empty($_SESSION['login'])){
        $_SESSION['password1'] = '';
        $_SESSION['login'] = '';
    }
}
cheak_session();
function clear_session(){
    $_SESSION['password1'] = '';
    $_SESSION['login'] = '';
}
?> 

<main class="flex-shrink-0">
  <div class="container">
    <?php
require_once "template/alerts.php";
if(isset($_POST['go'])){
    if(empty($_POST['login']) || empty($_POST['password1']) || empty($_POST['password2'])){
        alerts('danger', $error[0]);
    }else{
        if($_POST['password1'] != $_POST['password2']){
            $_SESSION['password1'] = $_POST['password1'];
            $_SESSION['login'] = $_POST['login'];
            alerts('danger', $error[3]);
        }else{
            $q = 'SELECT * FROM `users` WHERE `login` = "'.$_POST['login'].'"';
            $res = mysqli_query($link, $q);
            $cheak_login = MyFetch($res);
            if(!$cheak_login){;
                $date = date('Y-m-d');
                $passwordHASH = password_hash($_POST['password1'], PASSWORD_DEFAULT);
                $q = 'INSERT INTO `users` (`login`,`pass`,`date`,`active`,`admin`) VALUES ("'.$_POST['login'].'","'.$passwordHASH.'","'.$date.'",1,0)';
                $res = mysqli_query($link, $q);
                if(!$res) {
                    $error = mysqli_error($link); // Возвращает последнюю ошибку выполнения SQL запроса
                    exit("Ошибка MySQL: " . $error);
                }
                header_safe('loginform.php');
            }else{
                clear_session();
                alerts('danger', $error[2]);
            }
        }
    }
}
    ?>
    <h1 class="mt-5">Регистрация</h1>
    <p class="lead">Чтобы оставлять комментарии, вам необходимо пройти регистрацию</p>

    <form method="post">
	  <div class="mb-3">
	    <label for="login" class="form-label">Логин</label>
	    <input type="text" class="form-control" id="login" name="login" value="<?=$_SESSION['login']?>">
	  </div>
	  <div class="mb-3">
	    <label for="password1" class="form-label">Пароль 1</label>
	    <input type="password" class="form-control" id="password1" name="password1" value="<?=$_SESSION['password1']?>">
	  </div>
	  <div class="mb-3">
	    <label for="password2" class="form-label">Пароль 2</label>
	    <input type="password" class="form-control" id="password2" name="password2">
	  </div>		  	  	  
	  <button type="submit" class="btn btn-primary" name="go">Зарегистрироваться</button>
      <div class="mb-3">
	    <a href="loginform.php">Уже есть аккаунт</a>
	  </div>
	</form>

  </div>
</main>

<?php
  require_once "template/footer.php";
?> 