<?php
session_start();
if ($_POST['vihod']=='Выход'){
	$_SESSION['login']='';
	$_SESSION['pass']='';
	$_SESSION['status']='';
}
?>
    <head>
    	<link rel="shortcut icon" href="logo/favicon.ico">
    	<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<title>Wells</title>
        <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<?php
	//подключение к бд
	include 'connect.php';
	?>
    <body>
			<!-- Шапка -->
		<header>
				<!-- Logo -->
			<div class='Logo'>
				<img src='logo/logo3.jpg' alt='logo' class='image_logo'>
			</div>
				<!-- Name -->
			<div class='name'>
				<h1 class="nametxt"><font face='MinimalistVonesa'>Wells.<font></h1>
			</div>
			<!-- vhod -->
			<div class='vhod'>
			<?
				include 'vhod.php';
			?>
			</div>
		</header>
		<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
		    <div class="carousel-indicators">
		      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
		      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
		    </div>
		    <div class="carousel-inner">
		      <div class="carousel-item active">
		        <img style="width: 100%; height: 100%; object-fit: cover;" src="tovar/2.png">
		        <div class="container">
		          <div class="carousel-caption text-start karusel">
		            <h1>Самые лучшие.</h1>
		            <p>У нас есть самые лучшие и быстрые машины мира.</p> 
		          </div>
		        </div>
		      </div>
		      <div class="carousel-item">
		        <img style="width: 100%; height: 100%; object-fit: cover;" src="tovar/6.png">
		        <div class="container">
		          <div class="carousel-caption karusel">
		            <h1>Эксклюзивность.</h1>
		            <p>Самые редкие и лимитированые серии машин.</p>
		          </div>
		        </div>
		      </div>
		      <div class="carousel-item">
		        <img style="width: 100%; height: 100%; object-fit: cover;" src="tovar/12.png">
		        <div class="container">
		          <div class="carousel-caption text-end karusel">
		            <h1>Будущее уже здесь.</h1>
		            <p>Самые передовые технологии.</p>
		          </div>
		        </div>
		      </div>
		    </div>
		    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
		      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		      <span class="visually-hidden">Предыдущее</span>
		    </button>
		    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
		      <span class="carousel-control-next-icon" aria-hidden="true"></span>
		      <span class="visually-hidden">Следующее</span>
		    </button>
	  	</div>
		<!-- Menu -->
		<?
		include 'nav.php';
		?>

	<!--Основная Часть-->
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
					<input type='submit' name='kategory' value='<? echo $row[1]; ?>'>
				</form>
				<?
				}
				?>
				<form action='index.php' method='post'>
					<input type='submit' name='kategory' value='Все товары'>
				</form>
			</section>
			<section class='center'>
				<?
				//получение переменных
				$kategory=$_POST['kategory'];
				//проверка переменной
				if ($_POST['kategory']=='Все товары')
				{
					//запрос на отображение товаров
					$query1="SELECT * FROM `tovar`";
				}
				elseif ($_POST['kategory']!='')
				{
					//запрос на отображение товаров
					$query1="SELECT * FROM `tovar` WHERE `kategory`='$kategory' ";
				}
				else
				{
					//запрос на отображение товаров
					$query1="SELECT * FROM `tovar`";
				}
				//отправка запроса
				$result=mysqli_query($conn,$query1);
				//цикл с выводом данных из БД
				while($row=mysqli_fetch_array($result)){
				?>
				<div class='tovar'>
					<div class='tovar_img'>
						<img src='tovar/<? echo $row[4];?>'  alt='tovar' class='scale tovar_img'>
					</div>
					<div class='tovar_about'>
						<h1><font class="carname" size='4'><? echo $row[1]; ?><font><h1>
						<p><font size='5'><? echo $row[3];?>₽<font><p>				
						<p><font size='2'><? echo $row[5];?><font><p>
						<form action= 'tovar.php' method='post'>
							<input type='submit', value='Подробнее'>
							<input type='hidden' name='id_tov' value='<? echo $row[0]; ?>'>
						</form>
					</div>
				</div>
				<?
				}
				?>
				
			</section>
			<section class='right'>
				<img src='сайт/q2.jpg' alt='rek_time' class='rek_time'>
			</section>
		</main>
		<!--Podval-->
		<footer>
			<div class='kt'>
				<p>г. Якутск, Республика Саха (Якутия)<p>
				<p>+7 (999)-060-25-18<p>
			</div>
			<div class='inst'>
				<p>Ссылки:<p><a href='https://vk.com/n.brovarskoy' class=''><font color='black'>VK<font></a>
			</div>
				<div class=''>
			
			</div>
		</footer>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	</body>
</html>