<?php
session_start();
?>
<br>
<a href='auto.php' class='a1'>Вход</a>
<a href='reg.php' class='a1'>Регистрация</a>
<?
if ($_SESSION['login']!=''){
?>
<a href='admin.php' class='a1'>Админ</a>
<br><br>
<?
}
?>
<?
if ($_SESSION['login']!=''){
?>
<form action='index.php' method='post'>
	<input type='submit' name='vihod' value='Выход'>
</form>
<?
}