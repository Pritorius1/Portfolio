<?php
session_start();
?>
<nav>
	<!-- главная -->
	<div class='a2'>
		<a style="text-decoration: none; color: black;" href='index.php' class=''>Каталог</a>
	</div>
	<!-- о нас -->
	<div class='a2'>
		<a style="text-decoration: none; color: black;" href='o_nas.php' class=''>О нас</a>
	</div>
	<?
	if ($_SESSION['login']!=''){
	?>
	<!-- личный кабинет -->
	<div class='a2'>
		<a style="text-decoration: none; color: black;" href='LK.php' class=''>Личный кабинет</a>
	</div>
	<!-- корзина -->
	<div class='a2'>
		<a style="text-decoration: none; color: black;" href='korzina.php' class=''>Корзина</a>
	</div>
	<?
	}
	?>
	<!-- контакты -->
	<div class='a2'>
		<a style="text-decoration: none; color: black;" href='kontacts.php' class=''>Контакты</a>
	</div>
</nav>