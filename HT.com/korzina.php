<?
session_start();
?>
<html>
	<head>
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
		
			<!-- left-->
			
				 
				 
			</section>
			<!-- center-->
			<section class="center">
				<table class="c2">
					<tr>
						<td>
							№
						</td>
						<td>
							Изображение
						</td>
						<td>
							Цена за ед.
						</td>
						<td>
							Наименование
						</td>
						<td>
						
						</td>
						<td>
							Количество
						</td>
						<td>
						
						</td>
						<td>
							Описание
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
					$kolvo=$row[8];
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
								$query2="INSERT INTO `korzina`(`id_tov`,  `img`, `name`,`about`,`kolvo`,`price`,`login`) 
												      VALUES ('$id_tov', '$img','$name','$about','$kolvo','$price','$login')";		
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
									<? echo $i++; ?>
								</td>
								<td>
									<img src='tovar/<? echo $row2[2]; ?>' alt='tovar' class='tovar_mini'>
								</td>
								<td align="center">
									<? echo $row2[6]; ?>
								</td>
								<td>
									<? echo $row2[3]; ?>
								</td>
								<td>
									<form action = 'korzina.php' method='post'>
										<input type ='hidden' name='id_tov' value='<?echo $row2 [1];?>'>
										<input type ='hidden' name='kolvo' value='<?echo $row2 [5];?>'>
										<input type ='submit'  class='a4' name='minus' value='<'>
									</form>
								</td>
								<td align="center">
									<? echo $row2[5]; ?>
								</td>
								<td>
									<form action= 'korzina.php' method='post'>
										<input type='hidden' name='id_tov' value='<?echo $row2 [1];?>'>
										<input type='hidden' name='kolvo' value='<?echo $row2 [5];?>'>
										<input type='submit' class='a4'  name='plus' value='>'>
									</form>
								</td>
								<td>
									<? echo $row2[4]; ?>
								</td>
								<td align="center">
									<? echo $row2[5]*$row2[6]; $summ=$row2[5]*$row2[6]+$summ;?>
								</td>
							</tr>
							<?
						}
					}
						
					?>
					<tr>
						<td colspan=3>
							Итоговая сумма: <? echo $summ;?>
						</td>
						<td colspan=3>
							<form action='LK.php' method='post'>
								<input type='submit' class='a1' name='zakaz' value='Оформить заказ'>
							</form>
						</td>
					</tr>
				</table>
			</section>
			<!--right -->
			<section class="right">
				<img src='img/3.png' alt='rek_time' class='rek_time'>
			   
			</section>
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
				<a href='index.php' class=''>Адрес</a> <br> <a>ашан</a>
			</div>
			<!-- Служба поддержки -->
			<div class='a3'>
				<a href='index.php' class=''>Помощь</a> <br> <a>Обратная связь</a>
			</div>
		</footer>
	</body>
</html>