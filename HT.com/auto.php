<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- TITLE -->
	<title>HunTech</title>
	

	<?php
	include'connect.php';
	?>
	
	<!-- STYLE -->
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/templete.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
	<?php
	include'connect.php';
	session_start();
	?>
	<body>
		<!-- Шапка -->
		<!DOCTYPE html>
		<html lang="en">

		<body id="bg">
		<div class="page-wraper">
		<div id="loading-area"></div>
	<!-- header -->
    <header class="site-header mo-left header-full header">
		
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix ">
                <div class="container-fluid">
					<div class="header-content-bx">
						<!-- website logo -->
						<div class="logo-header">
							<a href="index.php"><img src="images/logo.png" alt=""/></a>
						</div>
						<!-- button -->
						
						

						<div class="extra-nav">
							<div class="extra-cell">
								<ul>
									<?php
									include 'vhod.php'
									?>
								</ul>
							</div>
						</div>
						
						<!-- nav -->
						<div class="header-nav navbar-collapse collapse justify-content-center nav-dark" id="navbarNavDropdown">
							<ul class="nav navbar-nav">	
								<li class="">
									<a href="index.php">Главная</a>
								</li>
								<li class="
								">
									<a href="#">Категории<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu">
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
									</ul>
								<li><a href="about-us.html">О нас</a></li>
								<li><a href="contact.html">Контакты</a></li>
							</ul>
							
						</div>
					</div>
				</div>
            </div>
        </div>
    </header>
		<!-- Меню -->
		<!-- Основная часть -->
		<main>
			<!-- left -->
			
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
				<center >
					
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
			
			
		</main>
		<!-- подвал -->
		<footer>
			<!-- О нас -->
			<div class='a3'>
				<a href='index.php'> Контакт </a> <br> <a>8996-840-75-36</a>
			</div>
			<!-- Политика конфиденциальности -->
			<div class='a3'>
				<a href='index.php' class=''>Почта</a> <br> <a>MajesticMotors@gmail.com</a>
			</div>
			<!-- Помошь -->
			<div class='a3'>
				<a href='index.php' class=''>Адрес</a> <br> <a>22/8</a>
			</div>
			<!-- Служба поддержки -->
			<div class='a3'>
				<a href='index.php' class=''>Помощь</a> <br> <a>Обратная связь</a>
			</div>
		</footer>
    <!-- Footer -->
    <button class="scroltop fa fa-chevron-up" ></button>
</div>

	</body>
	<!-- JS -->
		<script src="js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
		<script src="plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
		<script src="plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
		<script src="js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS -->
</html>