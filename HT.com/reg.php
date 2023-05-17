<?php
session_start();
?>
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
				if ($_POST['reg']=='Зарегистрироваться'){
					//получение значения переменных
					$login=$_POST['login'];
					$email=$_POST['email'];
					$img=$_POST['img'];
					$adres=$_POST['adres'];
					$tel=$_POST['tel'];
					$gorod=$_POST['gorod'];
					$fio=$_POST['fio'];
					$dr=$_POST['dr'];
					$pass1=$_POST['pass1'];
					$pass2=$_POST['pass2'];
					
					
					if ($pass1 != $pass2) {echo "<p>Пароль не верен</p>";}
					else{
						$pass=$pass1;
						//запрос на поиске пользователя
						$query="SELECT * FROM `user` WHERE `login`='$login' ";
						//отправляем запрос
						$result=mysqli_query($conn, $query);
						//Проверка на логин в бд
						$num=mysqli_num_rows($result);
						if ($num>0){echo "<p>Пользователь с этим именем уже зарегистрирован</p>";}
						else{
							//запрос на добавление пользователя
							$query= "INSERT INTO `user` (`login`,`email`,`img`,`adres`,`tel`,`gorod`,`fio`,`dr`,`pass`,`status`) 
												 VALUES ('$login','$email','0.png', '$adres','$tel','$gorod','$fio','$dr','$pass1', 0)";
							//отправка запроса

							$result=mysqli_query($conn,$query);
							//сообщение пользователя
							echo "<p>Пользователь успешно зарегистрирован!</p>";
							echo "<p><a href='index.php' class='alt'> Пройдите в личный кабинет</a></p>";
							}
						}
					}
				else
				{
				//форма регистрации
				?>
				
				<center>
					<table class='c1 a4'>
						<form  action = 'reg.php' method='post' >
							<br><br><br>
							<tr>
								<td>
									Введите логин
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type = 'text' name = 'login' placeholder='Логин'>
								</td>
							</tr>
							<tr>
								<td>
									Введите почту
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type = 'text' name = 'email' placeholder='Почта'>
								</td>
							</tr>
							<tr>
								<td>
									Введите адрес
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type = 'text' name = 'adres' placeholder='Адрес'>
								</td>
							</tr>
							<tr>
								<td>
									Введите город проживания
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type = 'text' name = 'gorod' placeholder='Город'>
								</td>
							</tr>
							<tr>
								<td>
									Введите ФИО
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type = 'text' name = 'fio' placeholder='ФИО'>
								</td>
							</tr>
							<tr>
								<td>
									Введите дату рождения
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type = 'text' name = 'dr' placeholder='Дата рождения'>
								</td>
							</tr>
							<tr>
								<td>
									Введите телефон
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type = 'text' name = 'tel' placeholder='Телефон'>
								</td>
							</tr>
							<tr>
								<td>
									Введите пароль
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type = 'password' name = 'pass1' placeholder='Пароль'>
								</td>
							</tr>
							<tr>
								<td>
									Подтвердите пароль
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type = 'password' name = 'pass2' placeholder='Пароль'>
								</td>
							</tr>
							<tr>
								<td>
									Пользовательское соглашение
									<input  type = 'checkbox' name = 'ps'>

								</td>
							</tr>
							<tr>
								<td colspan = '2'>
								<input style="font-size: 20;" type = 'submit' class='a1' name = 'reg' value='Зарегистрироваться'>
								</td>
							</tr>
						</form>
					</table>
				</center>
				<?
				}
				?>
					
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
							
							$_SESSION['status']=$row['5'];//у всех номер отличается
							//отправка запроса
							
							//сообщение пользователя
							echo "<p>Пользователь успешно авторизовался!</p><br>";
							echo "<p><a href='LK.php' class='a1'>Пройдите в личный кабинет</a></p>";
							
							//доступ к фдмине
							if ($_SESSION['status']==1){
								echo "<p><a href='admin.php' class='a1'>Пройдите в админ панель!</a></p>";
							}
						}
							else{
								echo "<p>Данные не верны!</p>";
								echo "<p><a href='reg.php' class='a1'>Попробуйте еще раз</a></p>";
						}
				}
				else{
					
				?>
				<!--Форма авторизации-->	
				<br><br>
				<center>
					<table class="c1 a4">
						<form  action = 'reg.php' method='post'>
							<tr>
								<td>Введите логин</td>
							</tr>
							<tr>
								<td><input class='c1' type = 'text' name = 'login' placeholder='Логин'></td>
							</tr>
							<tr>
								<td>Введите пароль</td>
							</tr>
							<tr>
								<td><input class='c1' type = 'password' name = 'pass' placeholder='Пароль'></td>
							</tr>
							<tr>
								<td style="text-align: center; " colspan = '2'>
								<input style="font-size: 20;width: 100px;" type = 'submit' class='a1' name = 'auto' value='Войти'>
								</td>
							</tr>
						</form>
					</table>
				</center>
				<br><br><br>
				<?
				}
				?>
			</section>
			

		</main>
		<!-- подвал -->
		<footer	q>
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
			
		
	<!-- JS -->
		<script src="js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
		<script src="plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
		<script src="plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
		<script src="js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS -->
</html>