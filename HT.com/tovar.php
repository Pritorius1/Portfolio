<?
session_start();
if ($_POST['vihod']=='Выход'){
    $_SESSION['login']='';
    $_SESSION['pass']='';
    $_SESSION['status']='';
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>MajesticMotors</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/templete.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	</head>
	<?php 
	include'connect.php';
	?> 
	<body>
		<!--шапка-->
		    <header class="site-header mo-left header-full header">
		
		        <div class="sticky-header main-bar-wraper navbar-expand-lg">
		            <div class="main-bar clearfix ">
		                <div class="container-fluid">
							<div class="header-content-bx">
								<!-- website logo -->
								<div class="logo-header">
									<a href="index.php"><img src="images/logo.png" alt=""/></a>
								</div>

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
								<div class="header-nav navbar-collapse collapse justify-content-center " id="navbarNavDropdown">
									<ul class="nav navbar-nav">	
										<li class="">
											<a href="index.php">Главная</a>
										</li>
										<li class="">
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
										<li><a href="LK.php">Личный кабинет</a></li>
									</ul>
									
								</div>
							</div>
						</div>
		            </div>
		        </div>
    		</header>
		
		<!--меню-->
		<!-- главная -->
			
		<!--основная часть-->
		<main>
			<!-- left-->
			
			</section>
			<!-- center-->
			<section class="center">
				<?
				//получение переменных
				$id_tov=$_POST['id_tov'];
				//запрос на отображение товаров
				$query1="SELECT * FROM `tovar` WHERE `id` ='$id_tov'";
				//отправка запроса
				$result = mysqli_query($conn,$query1);
				$row = mysqli_fetch_array($result)
				?>
				<div class='tovar'>
					<div class='tovar_img'>
						<img src='tovar/<?echo $row[4];?>' alt='tovar' class='tovar_img1'>
					</div>
					<div class='tovar_about'>
						<h3><?echo $row[1];?></h3>
						<p>Цена:<?echo $row[3];?></p>
						<p>Описание:<?echo $row[5];?></p>
						<form action='korzina.php' method='post'>
							<input type='hidden' class='a4' name='id_tov' value='<? echo $row[0]; ?>'>
							<input type='submit' class='a4' name='korzina' value='В корзину'>
							
						</form>
					</div>
				</div>
				
				<div class='a5'>
					<p><b>Информация о товаре:</b><br><?echo $row[9];?></p>
					<p><b>Цвет:</b><br><?echo $row[6];?></p>
					<p><b>Страна производителя:</b><br><?echo $row[7];?></p>
				</div>
			
			
			</section>
			<!--right -->
			
		</main>
		<!--подвал-->
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
				<a href='index.php' class=''>Адрес</a> <br> <a>Ашан</a>
			</div>
			<!-- Служба поддержки -->
			<div class='a3'>
				<a href='index.php' class=''>Помощь</a> <br> <a>Обратная связь</a>
			</div>
		</footer>
	</body>
</html>