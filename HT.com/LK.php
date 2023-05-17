<?php
session_start();
?>
<html>
    <head>
		<title>ShohShop</title>
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
		<!-- Шапка -->
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
		<!-- Меню -->
		
		<!-- Основная часть -->
		<main>
			<!-- left -->
			
			<!-- center -->
			<section class='center'>
				<div>
				<?
				if ($_SESSION['login']!=''){
				?>
				<h2 align="center" style="font-family: Arial;">Личный кабинет</h2>
				<!-- аватор из ЛК -->
				<?
				$login=$_SESSION['login'];
				
				if ($_POST['img'] == 'Сохранить'){
					//применяем переменные 
					$avatar=$_POST['avatar'];	
					//запрос на редактирвоание авы
					$query = "UPDATE `user` SET `img` ='$avatar' WHERE `login` = '$login' ";
					//отправка запроса
					$result = mysqli_query($conn,$query);
				}	
				if ($_POST['save']=='Сохранить'){
						//принимаем переменные
						$login1=$_POST['login'];
						$email=$_POST['email'];
						$pass=$_POST['pass'];
						$adres=$_POST['adres'];
						$tel=$_POST['tel'];
						$fio=$_POST['fio'];
						$gorod=$_POST['gorod'];
						$dr=$_POST['dr'];
						//запрос на редактирование аватар
						$query="UPDATE `user` SET `login`='$login1', `email`='$email', `pass`='$pass',`adres`='$adres', 
						`tel`='$tel', `fio`='$fio', `gorod`='$gorod', `dr`='$dr' WHERE `login`='$login'";
						$result= mysqli_query($conn, $query);
						
					}
                //запрос на отображение
                $query="SELECT * FROM `user` WHERE `login`='$login' ";
                //отправка запроса
                $result=mysqli_query($conn,$query);
				//вывод из БД
				$row=mysqli_fetch_array($result);
				?>
				
					<img src='img/<? echo $row[3]; ?>' alt='avatar' class='avatar'>
					<form style="margin-top:210px; margin-left: -210px;" class="b2" action='LK.php' method='post'>				
						<input style="width: 270px;" class="b1" type='file'  name='avatar'>
						<br>
						<input class="b1" type='submit' name='img' value='Сохранить'>
					</form>
					</div>
				<!-- форма для вывода данных и ЛК -->
				<div>
					<form  class="a6" action='LK.php' method='post'>
						<table  class="c1" align="center">
							<tr>
								<td>
									Логин
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type='text' name='login' value= '<? echo $row[1];?>'>
								</td>
							</tr>
							<tr>
								<td>
									<label>Пароль</label>
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type='password' name='pass' value= '<? echo $row[9];?>'>
								</td>
							</tr>
							<tr>
								<td>
									<label>Почта</label>
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type='mail' name='email' value= '<? echo $row[2];?>'>
								</td>
							</tr>
							<tr>
								<td>
									<label>Адрес доставки</label>
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type='text' name='adres' value= '<? echo $row[4];?>'>
								</td>
							</tr>
							<tr>
								<td>
									<label>Город</label>
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type='text' name='gorod' value= '<? echo $row[6];?>'>
								</td>
							</tr>
							<tr>
								<td>
									<label>Телефон</label>
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1" type='text' name='tel' value= '<? echo $row[5];?>'>
								</td>
							</tr>
							<tr>
								<td>
									<label>ФИО</label>
								</td>
							</tr>
							<tr>
								<td>
									<input class="c1"type='text' name='fio' value= '<? echo $row[7];?>'>
								</td>
							</tr>
							<tr>
								<td>
									<label>Дата рождения</label>
								</td>
							</tr>
							<tr>
								<td>	
									<input  class="c1" type='text' name='dr' value= '<? echo $row[8];?>'>
								</td>
							</tr>
							<tr class="btnholder">
								<td>
									<input style="margin-top: 20px; font-size: 20px; width: 250px;" type='submit' name='save' class="b1" value='Сохранить'>
								</td>
							</tr>
						</table>
					</form>
				</div>

				<?
				}
				else{
					echo "<h3 style='font-size:30'>У вас нет доступа</h3>";
					echo "<h3><a class='a4' href='auto.php'> Авторизируйтесь еще раз</a></h3>";
				}
				?>
				<br>
				<?
				if ($_SESSION['login']!=''){
				?>
				<h2 align="center" style="font-family: Arial;">История заказов</h2>
				<br>
				<table border='1' style=" font-family: Arial; font-size: 20px; width: 1130px;">
					<tr>
						<td style="width:35; text-align: center;">
							№
						</td>
						<td style='text-align: center;'>
							Изображение
						</td>
						<td style="width: 100px; text-align: center; ">
							Наименование
						</td>
						<td style="text-align: center;  width: 250px;">
							Описание
						</td>
						<td style="width: 80px;text-align: center ">
							Кол-во
						</td>
						<td style="width: 160px; text-align:center;">
							Цена за ед.
						</td>
						
						<td style="width: 160px; text-align:center;">
							Итоговая цена
						</td>
					</tr>
						<?
						//проверка на "Оформить заказ"
						if ($_POST['zakaz']=='Оформить заказ'){
						$login=$_SESSION['login'];
						//Запрос на отображение товара 
						$query1="SELECT * FROM `korzina` WHERE `login`='$login'";
						$result1=mysqli_query($conn,$query1);
						//цикл с выгрузкой данных из корзины
						while($row=mysqli_fetch_array($result1)){
							$id_tov=$row[1];
							$img=$row[2];
							$name=$row[3];		
							$about=$row[4];
							$kolvo=$row[5];
							$price=$row[6];
							$login=$row[7];
							
							//Запрос на оформирование заказа 
							$query="INSERT INTO `zakaz`(`id_tov`,`img`, `name`,`about`,`kolvo`,`price`,`login`, `status`) 
												VALUES ('$id_tov','$img','$name','$about','$kolvo','$price','$login','Новый')";
							
							//отправка запроса
							$result=mysqli_query($conn,$query);
							//echo $query;
							}


							//очищаем корзину
							$query2="DELETE FROM `korzina` WHERE `login` = '$login' ";
											
							//отправка запроса
							$result2=mysqli_query($conn,$query2);
							}

						$login=$_SESSION['login'];
						$i=1;
						//отображаемый список заказов
						$query3="SELECT * FROM `zakaz` WHERE `login`='$login'";
						//отправка запроса 
						$result3=mysqli_query($conn,$query3);
						//цикл с выгрузкой  данных из корзины
						while($row=mysqli_fetch_array($result3)){
		
						?>
						
						
					<tr>
                        <td style="text-align: center;">
                            <? echo $i++; ?>
                        </td>
                        <td style="padding-left: 25px;" >
                            <img src='tovar/<? echo $row[2]; ?>' alt='tovar' class='tovar_mini'>
                        </td>
                        <td align="center"  style="padding-left: 20px;padding-right: 20px;">
                            <? echo $row[3]; ?>
                        </td>
                        <td  style="text-align: center;">
                            <? echo $row[4]; ?>
                        </td>
                        <td align="center">
                            <? echo $row[5]; ?>
                        </td>
                        <td style="text-align: center; width: 120; ">
                            <? echo $row[6]; ?>
                        </td>
                        <td style="text-align: center;">
                            <? echo $row[5]*$row[6]; ?>
                        </td>
                    </tr>
                    <?
                    }
                    ?>
					</table>
					<br><br><br>
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
				<a href='index.php' class=''>Адрес</a> <br> <a>Ашан</a>
			</div>
			<!-- Служба поддержки -->
			<div class='a3'>
				<a href='index.php' class=''>Помощь</a> <br> <a>Обратная связь</a>
			</div>
		</footer>
	</body>
</html>