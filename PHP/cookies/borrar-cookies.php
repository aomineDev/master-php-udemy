<?php 
if (isset($_COOKIE['galleta'])) {
	unset($_COOKIE['galleta']);
	setcookie('galleta', '', time()-100);
}

if (isset($_COOKIE['unyear'])) {
	unset($_COOKIE['unyear']);
	setcookie('unyear', '', time()-100);
}

header('Location:index.php');

?>