<?php
	session_start();
	session_destroy();
	setcookie("i","",time()-3600);
	header('Location: index.php');
	exit; 
?>