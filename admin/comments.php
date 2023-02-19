<?php 
require_once 'header.php';
require_once '../template/cfg.php';
require_once '../template/functions.php';

$q = 'SELECT * FROM `comment` ORDER BY `date` DESC';
$data = mysqli_query($link,$q);
$data = MyFetch($data);

$errors = array();
$success = array();

if(!empty($_SESSION['success'])){
	$success = $_SESSION['success'];
	unset($_SESSION['success']);
}
if(!empty($_SESSION['errors'])){
	$error = $_SESSION['errors'];
	unset($_SESSION['errors']);
}

?>
<main class="flex-shrink-0">
    <div class="container">
    <?php
	require '../template/alerts.php';
	alert('danger', $errors);
	alert('success', $success);
	?>
        <h1 class="mt-5">Комментарии CMS</h1>
        <table class="table table-striped">
            <!--Begin main block-->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>URL Страницы</th>
                    <th>Пользователь</th>
                    <th>Содержание</th>
                    <th>Дата</th>
                    <th>Операции</th>
                </tr>
            </thead>
            <!--End main block-->
            <tbody>
                <?php 
                    $usersID = array();
		            foreach($data as $d){
			        $usersID[] = $d['user_id'];
		            }
		            $usersID = array_unique($usersID);
		            $users = getUsers($link,$usersID);
                    $pages = getPages($link); 
                    $pagesUrl = getPagesUrl($link);
                    $userName = 'Пользователь удалён.';
			        if(!empty($users[$d['user_id']]['login'])){
				        $userName = $users[$d['user_id']]['login'];
			        }
                    foreach($data as $d){
                        $comment = $d['comment'];
                        if(mb_strlen($comment) > 120){ // Функция для показания сколько символов в тексте
                            $comment = mb_substr($comment,0,120); // Функция берёт и отрезает часть строки
                            $comment .= '...';
                        }
                        echo '<tr>
                        <td>'.$d['id'].'</td>
                        <td><a href="../page.php?url='.$pagesUrl[$d['page_id']].'">'.$pages[$d['page_id']].'</a></td>
                        <td>'.$userName.'</td>
                        <td>'.$comment.'</td>
                        <td>'.$d['date'].'</td>
                        <td><a href="func/del_comment.php?id='.$d['id'].'" class="mb-3 btn btn-danger" onclick="return confirm(\'Подтвердите удаление\')">Удалить</a></td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php 
require_once 'footer.php';
?>