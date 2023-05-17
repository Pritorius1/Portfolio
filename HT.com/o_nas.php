<html>
    <head>
		<title>ShohShop</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<?php
	include'connect.php';
	session_start();
	?>
	<body>
		<!-- Шапка -->
		<header>
			<!-- Лого -->
			<div class=''>
				<img src='img/2.jpg' alt='logo' class='img_logo'>
			</div>
			
			<!-- Name -->
			<div class='name'>
				<h1 ><a style="color:black; text-decoration:none" href='index.php'>ShohShop</a></h1>
			</div>
			
			<!-- Vhod -->
			<div class='vhod'>
				<?php
				include 'vhod.php'
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
				//Отображение нажатия кнопки
				if ($_POST['auto']=='Войти'){
					//получение значения переменных
					$login=$_POST['login'];
					$pass=$_POST['pass'];
					//запрос на поиске пользователя
						$query="SELECT * FROM `user` WHERE `login` = '$login' AND `pass` = '$pass'";
						//отправляем запрос
						$result=mysqli_query($conn, $query);
						//Проверка на пользователя в бд
						$num=mysqli_num_rows($result);
						if ($num==1){
							//Добовляем ланные в сессию
							$_SESSION['login']=$login;
							$_SESSION['pass']=$pass;
								
							//проверка статуса
							$row=mysqli_fetch_array($result); 
							
							$_SESSION['status']=$row['10'];//у всех номер отличается
							//отправка запроса
							
							//сообщение пользователя
							echo "<p style='font-size:25px; text-align:center;'>Пользователь успешно авторизовался!</p><br>";
							echo "<p style='text-align:center'><a style='font-size:25px' href='LK.php' class='a1'>Пройдите в личный кабинет</a></p>";
							
							//доступ к фдмине
							if ($_SESSION['status']==1){
								echo "<p style='text-align:center'><a style='font-size:25px;' href='admin.php' class='a1'>Пройдите в админ панель!</a></p>";
							}
						}
							else{
								echo "<p>Данные не верны!</p>";
								echo "<p><a style='font-size:25px; align:center;' href='auto.php' class='a1'>Попробуйте еще раз</a></p>";
						}
				}
				else{
					
				?>
				<!--Форма авторизации-->	
				<center>
					<table style="background: lightgray; padding: 10px; border-radius: 10px;">
						<br>
						<h2 style='color:lightgray; font-family:Verdana'>АВТОРИЗАЦИЯ</h2>
						<form action = 'auto.php' method='post'>
							<br>	
							<tr>

								<td><br><input style="margin-bottom: 20px;" class="btnAuto" type = 'text' name = 'login' placeholder='Имя пользователя'></td>
							</tr>
							<tr>
								<td><input class="btnAuto" type = 'password' name = 'pass' placeholder='Пароль'></td>
							</tr>
							<tr>
								<td align="center">
								<input  style='margin-top: 20px; font-size: 20;width: 200;' class="a1" type = 'submit' name = 'auto' value='Войти'>
								</td>
							</tr>
						</form>
					</table>
				</center>
				<?
				}
				?>
			</section>
			
			<!-- right -->
			<section class='right'>
				<img src='img/3.png' alt='rek_time' class='rek_time'>
			
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