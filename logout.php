<?php
include('login.php');
if ($_SESSION['logged']){
	$_SESSION['logged'] = false;
	$_SESSION['user_id'] = -1;
}else if ($_SESSION['access_token']){
	unset($_SESSION['access_token']);
}
header('Location: index.html');
?>