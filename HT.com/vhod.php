<div style=" margin-left: 10px " class="displayflex">
	<form  action='auto.php' method='post' >
		<input type='submit' class="a1" name='auto' value='Вход'>
	</form>
	<form action='reg.php' method='post' >
		<input type='submit' class="a1" name='reg' value='Регистрация'>
	</form>
</div>

<?
if ($_SESSION['login']!=''){
?>



<div style="margin-top: -35px; margin-left: -70px ">
	<form action='index.php' method='post'>
		<input type='submit' class='a1' name='vihod' value='Выход'>
	</form>
	<?
	}
	?>

	<?
	if ($_SESSION['status']==1){
	?>
	<form action='admin.php' method='post' >
			<input type='submit' class="a1" value='Админ'>
	</form>
</div>
<?
}
?>
