<?include($_SERVER['DOCUMENT_ROOT'].'/main/header.php');?>

    <h2>Авторизация</h2>

<?if (isset($auth) && $auth === false):?>
    <p class="danger">Пользователь с таким логином уже существует</p>
<?endif;?>
<?require_once($_SERVER["DOCUMENT_ROOT"].'/functions/class/Users.php');
if (!LR3\Users::isAuth($_SESSION["user"])):?>
    <form name="authForm" method="POST" enctype="multipart/form-data">
        <div>
            <label for="login">Логин</label>
            <br>
            <input id="login" name="authLogin" type="text" value="<?=$_REQUEST['authLogin']?>" required>
        </div>
        <div>
            <label for="pass">Пароль</label>
            <br>
            <input id="pass" name="password" type="password" required>
        </div>
        <input name="submit" class="button" type="submit" value="Авторизоваться">
    </form>
<?else:?>

    <div>
        <p>Вы успешно авторизовались на сайте!</p>
        <p>Перейти на <a href="/index.php">главную</a> страницу</p>
    </div>

<?endif;?>

<?include($_SERVER['DOCUMENT_ROOT'].'/main/footer.php');?>