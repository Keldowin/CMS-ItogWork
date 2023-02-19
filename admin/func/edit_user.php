<?php 
require_once '../header.php';
require_once '../../template/functions.php';
require_once '../../template/cfg.php';
require_once '../../template/alerts.php';

$id = isset($_GET['id']) ? $_GET['id'] : exit('Ошибка | Отсуствует id');

//Код при отправки формы
if(isset($_POST['go'])){
    if(!empty($_POST['login']) && !empty($_POST['password'])){
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $active = 0;
        if(!empty($_POST['active'])){
            $active = 1;
        }
        $admin = 0;
        if(!empty($_POST['admin'])){
            $admin = 1;
        }
        $q = 'UPDATE `users` SET `login`="'.$_POST['login'].'",`pass`="'.$hash.'",`active`="'.$active.'",`admin`='.$admin.' WHERE `id` = '.$id.'';
        $res = mysqli_query($link, $q);
        alerts('success','Пользователь успешно отредактирован');
    }else{
        alerts('danger','Ошибка, не все поля заполнены');
    }
}

$q = 'SELECT * FROM `users` WHERE `id` = '.$id.'';
$res = mysqli_query($link,$q);
$data = MyFetch($res);
if(!$data){
    exit('Пользователь был удалён');
}
?>
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Редактировать пользователя - <b><?=$data[0]['login'] ?></b></h1>
        <br><br>
        <form method="post">
            <div class="mb-3">
                <lable class="form-lable">Логин</lable>
                <input type="text" class="form-control" name="login" value="<?=$data[0]['login']?>" placeholder="Ссылка">
            </div>
            <div class="mb-3">
                <lable class="form-lable">Пароль</lable>
                <input type="text" class="form-control" name="password" value="<?=$data[0]['pass']?>" placeholder="Ссылка">
            </div>
            <div class="form-check">
                <lable class="form-lable">Админ</lable>
                <input type="checkbox" class="form-check-input" name="admin" <?php if($data[0]['admin'] != 0){echo 'checked';} ?>>
            </div>
            <div class="form-check">
                <lable class="form-lable">Активен</lable>
                <input type="checkbox" class="form-check-input" name="active" <?php if($data[0]['active'] != 0){echo 'checked';} ?>>
            </div>
            <button type="submit" class="mt-3 mb-3 btn btn-warning" name='go'>Обновить</button>
            <a href="../users.php" class="btn btn-danger">Назад</a>
        </form>
    </div>
</main>
<?php 
require_once '../footer.php';
?>