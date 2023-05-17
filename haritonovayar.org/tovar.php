<?php
session_start();
?>
<html>
    <head>
		<title>ShohShop.ru</title>
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
				<img src='сайт/q1.webp' alt='logo' class='image_logo'>
			</div>
				<!-- Name -->
			<div class='name'>
				<h1><font face='franklin gothic medium'>ShohShop<font></h1>
			</div>
			<!-- vhod -->
			<div class='vhod'>
			<?
				include 'vhod.php';
			?>
			</div>
		</header>
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
				$id_tov=$_POST['id_tov'];
				//запрос на отображение товаров
				$query1="SELECT * FROM `tovar` WHERE `id` = '$id_tov' ";
				//отправка запроса
				$result=mysqli_query($conn,$query1);
				//цикл с выводом данных из БД
				$row=mysqli_fetch_array($result);
				?>
				<div class='tovar'>
                    <div class='tovar'>
                        <img src='tovar/<? echo $row[4];?>'width='320' height='280' alt='tovar' class='scale'>
                    </div>
                    <div class='tovar_about'>
                        <h1><font size='4'><? echo $row[1]; ?><font><h1>
                        <p><font size='5'><? echo $row[3];?> <font face='Arial'>₽</font><font><p>
                        <p><font size='2'><? echo $row[5];?><font><p>
                        <p><font size='2'>В наличии: <? echo $row[6];?><font><p>
                        <form action='korzina.php' method='post'>
                            <input type='hidden', name='id_tov' value='<? echo $row[0]; ?>'>
                            <input type='submit', name='korzina' value='В корзину'>
                        </form>
                    </div>
                </div>
				
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
				<p>Ссылки:<p><a href='https://instagram.com/yajelohhh' class=''><font color='black'>Instagram<font></a>
			</div>
				<div class=''>
			
			</div>
		</footer>
		
	</body>
</html>