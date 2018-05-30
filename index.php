<?include($_SERVER['DOCUMENT_ROOT'].'/main/header.php');
require_once($_SERVER["DOCUMENT_ROOT"].'/functions/class/Users.php');

if (LR3\Users::isAuth($_SESSION["user"])):?>

    <p>Вы не можете просматривать данную страницу</p>
    <p>Пожалуйста, <a href="/register.php">зарегистрируйтесь</a> или <a href="/authorize.php">авторизуйтесь</a></p>

<?endif;?>
<?include($_SERVER['DOCUMENT_ROOT'].'/main/footer.php');?>