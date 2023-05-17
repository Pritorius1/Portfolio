<?
session_start();
?>
<html>
    <head>
		<title>ShohShop.ru</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<?php
	include'connect.php';
	?>

	<body>
		<!-- Шапка -->
		<header>
			<!-- Лого -->
			<div class=''>
				<img src='img/1.png' alt='logo' class='img_logo'>
			</div>
			
			<!-- Name -->
			<div class='name'>
				<h1>ShohShop</h1>
			</div>
			
			<!-- Vhod -->
			<div class='vhod'>
				<?
				include 'vhod.php';
				?>
			</div>
		</header>
		<!-- Меню -->
		<?
		include 'nav.php';
		?>
		<!-- Основная часть -->
		<main>
			<!-- left -->
			<section class='left'>
				<!-- Категории товаров -->
				<?
				//запрос на отображение категорий
				$query="SELECT * FROM `kategory`";
				//отправка запроса
				$result=mysqli_query($conn,$query);
				//цикл с выводом данных из БД
				while($row=mysqli_fetch_array($result)){
				?>
				<form action='index.php' method='post'>
					<input type='submit' class='a4' name='kategory' value='<? echo $row[1]; ?>'>
				</form>
				<?
				}
				?>
				<form action='index.php' method='post'>
					<input type='submit' class='a4' name='kategory' value='Все товары'>
				</form>
			</section>
			
			<!-- center -->
			<section class='center'>
				<table>
					<tr>
						<td>
							<h3>№</h3>
						</td>
						
						<td>
							Изображение
						</td>
						<td>
							Наименование
						</td>
						<td>
							Описание
						</td>
						<td>
							
						</td>
						<td>
							Количество
						</td>
						<td>
							
						</td>
						<td>
							Цена за ед.
						</td>
						<td>
							Итоговая цена
						</td>
					</tr>
					<?
					$id_tov=$_POST['id_tov'];
					//запрос на отображение товаров
					$query1="SELECT * FROM `tovar` WHERE `id`='$id_tov' ";
					
					$result=mysqli_query($conn,$query1);
					
					$row=mysqli_fetch_array($result);
					//перенос переменных
					$img=$row[4];
					$name=$row[1];
					$about=$row[5];
					$kolvo=$row[10];
					$price=$row[3];
					$login=$_SESSION['login'];
					if ($_SESSION['login']=='') echo "<h3><a href='reg.php'>Пройдите авторизацию</a></h3>";
					else{
						if ($_POST['korzina']=='В корзину') {
							$query4="SELECT * FROM `korzina` WHERE `id_tov`='$id_tov' AND `login`='$login' ";
							$result4 = mysqli_query($conn,$query4);
							$num=mysqli_num_rows($result4);
							if($num>0){
							//определяем количество в бд
								$row=mysqli_fetch_array($result4);
							//прибовляем ещё1
								$kolvo=$row[5]+1;
							//меняем в бд на +1
								$query5="UPDATE `korzina` SET `kolvo` = '$kolvo' WHERE `id_tov` = '$id_tov' AND `login` = '$login' ";
								$result5 = mysqli_query($conn, $query5);
						}
							else {
						//запрос на добавление товаров
								$query2="INSERT INTO `korzina`(`id_tov`,  `img`,  `name`, `about`, `kolvo`, `price`, `login`) 
												VALUES ('$id_tov', '$img', '$name', '$about','$kolvo', '$price', '$login')";		
						//отправка запроса
								$result2 = mysqli_query($conn,$query2);
							}
						}
						if ($_POST['plus']=='>') {
							$id_tov=$_POST['id_tov'];
							$kolvo=$_POST['kolvo']+1;
							$query="UPDATE `korzina` SET `kolvo` = '$kolvo' WHERE `id_tov` = '$id_tov' AND `login` = '$login' ";
							
							$result=mysqli_query($conn, $query);
						}
						if ($_POST['minus']=='<') {
							$id_tov=$_POST['id_tov'];
							if ($_POST['kolvo']==1) {
								$query="DELETE FROM `korzina` WHERE `id_tov` = '$id_tov' AND `login` = '$login' ";
						}
							else{
								$kolvo=$_POST['kolvo']-1;
								$query="UPDATE `korzina` SET `kolvo` = '$kolvo' WHERE `id_tov` = '$id_tov' AND `login` = '$login' ";
						}
						$result=mysqli_query($conn, $query);
					}
						//запрос на отображение корзины
						$query3="SELECT * FROM `korzina` WHERE `login`='$login' ";
						//счетчик
						$i=1;
						$result3 = mysqli_query($conn,$query3);
						//цикл с выводом данных из БД
						while($row2=mysqli_fetch_array($result3)){
							?>
							<tr>
								<td>
									<? echo $i++;?>
								</td>
								<td>
									<img src='tovar/<? echo $row2[2];?>' alt='tovar' class = 'tovar_mini'>
								</td>
								<td>
									<? echo $row2[3]; ?>
								</td>
								<td>
									<? echo $row2[4]; ?>
								</td>
								<td>
									<form action='korzina.php' method='post'>
										<input type = 'hidden' name = 'id_tov' value='<? echo $row2 [1]; ?>'>
										<input type = 'hidden' name = 'kolvo' value='<? echo $row2 [5]; ?>'>
										<input type='submit' class ='a4' name='minus' value='<'>
									</form>
								</td>
								<td>
									<? echo $row2[5]; ?>
								</td>
								<td>
									<form action='korzina.php' method='post'>
										<input type = 'hidden' name = 'id_tov' value='<? echo $row2 [1]; ?>'>
										<input type = 'hidden' name = 'kolvo' value='<? echo $row2 [5]; ?>'>
										<input type='submit' class ='a4' name='plus' value='>'>
									</form>
								</td>
								<td>
									<? echo $row2[6]; ?>
								</td>
								<td>
									<? echo $row2[5]*$row2[6]; ?>
								</td>
							</tr>
							<?
						}
					}
				//}
					?>	
				</table>
			</section>
			<!-- right -->
			<section class='right'>
				<img src='img/2.png' alt='rek_time' class='rek_time'>
			
			</section>
			
		</main>
		<!-- подвал -->
		<footer>
			<!-- О нас -->
			<div class='a3'>
				<a href='index.php'> Контакты </a> <br> <a></a>
			</div>
			<!-- Политика конфиденциальности -->
			<div class='a3'>
				<a href='index.php' class=''>Политика конфиденциальности</a> <br> <a>2</a>
			</div>
			<!-- Помошь -->
			<div class='a3'>
				<a href='index.php' class=''>Помошь</a> <br> <a></a>
			</div>
			<!-- Служба поддержки -->
			<div class='a3'>
				<a href='index.php' class=''>Служба поддержки</a> <br> <a></a>
			</div>
			

		</footer>
	</body>
</html>