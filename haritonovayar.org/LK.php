<?php
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
				<h1>Wells</h1>
			</div>
			<!--vhod-->
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
				<?
				if($_SESSION['login']!=''){
					?>
					<h2>Личный кабинет</h2>
					<!-- аватар из ЛК-->
					<?
					$login=$_SESSION['login'];
						//$login=$_POST['login'];
						$email=$_POST['email'];
						$adress=$_POST['adress'];
						$tel=$_POST['tel'];
						$pass1=$_POST['pass1'];
						$pass2=$_POST['pass2'];
						$fio=$_POST['fio'];
						$region=$_POST['region'];
						
					
						$pass=$pass1;
						if ($_POST['img']=='Сохранить'){
							$avatar=$_POST['avatar'];
							$query="UPDATE `user` SET `avatar`='$avatar' WHERE `login`='$login'";
							$result=mysqli_query($conn,$query);
						}
						if ($_POST['save']=='Сохранить'){
							   
							$_SESSION['login']=$login;
							$query="UPDATE `user` SET `region`='$region',`fio`='$fio',`login`='$login',`email`='$email', `adress`='$adress', `tel`='$tel', `pass`='$pass1' WHERE `login`='$login'";
							$result=mysqli_query($conn,$query);
						}
						$query="SELECT * FROM `user` WHERE `login`='$login'";
						//отправка запроса
						$result=mysqli_query($conn,$query);
						//цикл с выводом данных из БД
						$row=mysqli_fetch_array($result);
						?>
							<img src='img/<?echo $row[6]?>' alt='1.pmg' class='avatar'>
							<form action='LK.php' method='post' class='ava_change'>
								<input type='file' class='a6' name='avatar'>
								<input type='submit' class='a4' name='img' value='Сохранить'>
							</form>
							<!-- форма для вывода данных и ЛК -->
							<form action='LK.php' method='post' class='center'>
								<label>Логин</label>
								
								<input type='text' class='a6' name='login' value='<?echo $row[1]?>'>
								<label>ФИО</label>
								<input type='text' class='a6' name='fio' value='<?echo $row[8]?>'>
								<label>Email</label>
								<input type='text' class='a6' name='email' value='<?echo $row[3]?>'>
								<label>Пароль</label>
								<input type='password' class='a6' name='pass1' value='<?echo $row[2]?>'>
								<label>Повторите пароль</label>
								<input type='password' class='a6' name='pass2' value='<?echo $row[2]?>'>
								
								<label>Адрес доставки</label>
								<input type='text' class='a6' name='adress' value='<?echo $row[4]?>'>
								<label>Телефон</label>
								<input type='text' class='a6' name='tel' value='<?echo $row[5]?>'>
								<label>Регион</label>
								<input type='text' class='a6' name='region' value='<?echo $row[9]?>'>
								
								<input type='submit' class='a4' name='save' value='Сохранить'>
							</form>
						<h2>История заказов </h2>
						<table>
						<tr>
							<td>
								№
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
								Количество
							</td>
							<td>
								Цена за ед.
							</td>
							<td>
								Итоговая цена
							</td>
							<td>
								Дата оформления
							</td>
						</tr>
						<?
						//проверка на "Оформить заказ"
						if ($_POST['zakaz']=='Оформить заказ'){
							$login=$_SESSION['login'];
							//запрос на чтение корзины
							$query1="SELECT * FROM `korzina` WHERE `login`='$login'";
							//отправка запроса
							$result1=mysqli_query($conn, $query1);
							//цикл с выгрузкой данных из корзины
							while($row=mysqli_fetch_array($result1)){
								$id_tov = $row[1];
								$name = $row[3];
								$img = $row[2];
								$price = $row[6];
								$kolvo = $row[5];
								$about1 = $row[4];
								$date = date("y-m-d");
									
									//запрос на добавление заказа
									$query="INSERT INTO `zakaz`(`id_tov`, `name`, `img`, `price`, `kol-vo`, `about`, `date`, `login` ) 
														VALUES('$id_tov', '$name', '$img', '$price', '$kolvo', '$about', '$date', '$login')";
									$result=mysqli_query($conn,$query);
								}
								//очищаем корзину
								$query2="DELETE FROM `korzina` WHERE `login`='$login' ";
								//отправка запроса
								$result2=mysqli_query($conn, $query2);
							}
							//отображаем список заказов
							
							$login=$_SESSION['login'];
							$i=1;
							//запрос на поиск всех заказов пользователя
							$query3="SELECT * FROM `zakaz` WHERE `login`='$login'";
							//отправка запроса 
							$result3=mysqli_query($conn, $query3);
							//цикл с выгрузкорй данных из корзины
							while($row = mysqli_fetch_array($result3)){
							?>
								<tr>
									<td>
										<? echo $i++; ?>
									</td>
									<td>
										<img src='tovar/<? echo $row[3]; ?>' alt='tovar' class='tovar_mini'>
									</td>
									<td>
										<? echo $row[2]; ?>
									</td>
									<td>
										<? echo $row[6]; ?>
									</td>
									<td>
										<? echo $row[5]; ?>
									</td>
									<td>
										<? echo $row[4]; ?>
									</td>
									<td>
										<? echo $row[5]*$row[4]; ?>
									</td>
									<td>
										<? echo $row[7]; ?>
									</td>
								</tr>
							<?
							}
							?>
						</table>
					<?
					}
				
				else{
					echo "<h3>У вас нет доступа</h3>";
					echo "<h3><a href='reg.php' class = 'a1'>Авторизируйтесь еще раз</h3>";
				}
				?>
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
				<a href='index.php'> Контакты </a> <br> <a>8924-871-97-02</a>
			</div>
			<!-- Политика конфиденциальности -->
			<div class='a3'>
				<a href='index.php' class=''>Политика конфиденциальности</a> <br> <a>8924-871-97-02</a>
			</div>
			<!-- Помошь -->
			<div class='a3'>
				<a href='index.php' class=''>Помошь</a> <br> <a>8924-871-97-02</a>
			</div>
			<!-- Служба поддержки -->
			<div class='a3'>
				<a href='index.php' class=''>Служба поддержки</a> <br> <a>8924-871-97-02</a>
			</div>
			

		</footer>
	</body>
</html>