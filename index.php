
<!--    <script>-->
<!--    		const date = new Date(new Date().getTime() + 60 * 1000);-->
<!--			document.cookie = "name=image; path=/; expires=" + date.toUTCString();-->
<!--    </script>-->

	<?php
    setcookie('name', 'test');

    //		$dir = "./img/";
//		$img_a = array();
//
//		if (is_dir($dir)){
//		if($od = opendir($dir)){
//			while(($file = readdir($od)) !== false){
//				if(strtolower(strstr($file, "."))===".jpg" || strtolower(strstr($file, "."))===".gif" || strtolower(strstr($file, "."))===".png"){
//					array_push($img_a, $file);
//				}
//			}
//			closedir($od);
//		}
//		}
//
//		#$rd = rand(0, count($img_a)-1);
//		for ($i=0; $i<=count($img_a)-1; $i++) {
//			print '<img src=' . $dir.$img_a[$i] . ' weidth="200px" height="500px">';
//		}
	?>

 <!-- 1 | name| path | tartger_url | -->
<?include($_SERVER['DOCUMENT_ROOT'].'/main/header.php');?>
<?if (!LR3\Users::isAuth($_SESSION["user"])):?>

    <p>Вы не можете просматривать данную страницу</p>
    <p>Пожалуйста, <a href="/register.php">зарегистрируйтесь</a> или <a href="/authorize.php">авторизуйтесь</a></p>
<?endif;?>
<?include($_SERVER['DOCUMENT_ROOT'].'/main/footer.php');?>