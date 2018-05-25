<?include($_SERVER['DOCUMENT_ROOT'].'/main/header.php');?>

    <h2>Регистрация</h2>
    <?if (isset($reg) && !$reg) {?>
        <p class="danger">Пользователь с таким логином уже существует!</p>
    <?}?>

    <?if (!LR3\Users::isAuth($_SESSION["user"])):?>
        <form name="authForm" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="name">Имя</label></td>
                    <td><input id="name" name="name" type="text" value="<?=$_POST['name']?>" required></td>
                </tr>
                <tr>
                    <td><label for="family">Фамилия</label></td>
                    <td><input id="family" name="family" type="text" value="<?=$_POST['family']?>" required></td>
                </tr>
                <tr>
                    <td><label for="login">Логин</label></td>
                    <td><input id="login" name="login" type="text" value="<?=$_POST['login']?>" required></td>
                </tr>
                <tr>
                    <td><label for="password">Пароль</label></td>
                    <td><input id="password" name="password" type="password" required></td>
                </tr>
            </table>
            <input name="submitReg" class="button" type="submit" value="Зарегистрироваться">
        </form>
    <?else:?>
        <div>
            <p>Вы успешно зарегистрировались на сайте!</p><br>
            <p>Перейти на <a href="/index.php">главную</a> страницу</p>
        </div>
    <?endif;?>

<?include($_SERVER['DOCUMENT_ROOT'].'/main/footer.php');?>