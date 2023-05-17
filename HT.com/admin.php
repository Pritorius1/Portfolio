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
					<input type='submit' class='a4'  name='kategory' value='Все товары'>
				</form>
				<h3 style="font-size: 24px; margin-left: 20px;">Добавить</h3>
				<form action='admin.php' method='post'>
					<input type='submit' class='a4'  name='kat_add' value='Добавить категорию'>
				</form>
				<form action='admin.php' method='post'>
					<input type='submit' class='a4'  name='tov_add' value='Добавить товар'>
				</form>
			</section>
			<!-- center -->
			<section class='center'>
				<?
				if ($_SESSION['status']==1){
				?>
				<h2>Панель администратора</h2>
				<?
				
				//проверка нажатия кнопки
				if ($_POST['kat_add']=='Добавить категорию'){
					?>
					<form action="admin.php" method="post">
						<input type="text" name="name" placeholder="Название категории">
						<input type="submit" name="kat_add2" value="Добавление категории">
					</form>
					<?
				}
				//проверка нажатия кнопки
				if ($_POST['kat_add2']=='Добавление категории'){
					//получение переменных
					$name=$_POST['name'];
					//запрос на добавление категории
					$query="INSERT INTO `kategory` (`name`) VALUES ('$name')";
					//отправка запроса
					$result=mysqli_query($conn,$query);
					//сообщение
					echo "<h3>Категория добавлена!</h3><br>";
					echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";
				}
				?>	

				<?
				//проверка нажатия кнопки
				if ($_POST['tov_add']=='Добавить товар'){
					?>
					<form align='center' class='a6' action="admin.php" method="post">
						<input  class='a7' type="file" name="img" placeholder="Изображение товара">
						<br><br>
						<input type="text" class='a7' name="name" placeholder="Название товара">
						<br><br>
						<select  class='a7' name="kategory">
						    <?
                            //запрос на отображение категорий
                            $query="SELECT * FROM kategory";
                            //отправка запроса
                            $result=mysqli_query($conn,$query);
                            //цикл с выводом данных из БД
                            while($row=mysqli_fetch_array($result)){
                            ?>
                            <option class='a7' value='<? echo $row[1]; ?>'><? echo $row[1]; ?></option>
                            <?
                            }
                            ?>
						</select>
						<br><br>
						<input type="number" class='a7'  name="price" placeholder="Цена" style="width: 100px;">
						<br><br>
						<input type="text" class='a7'  name="about" placeholder="Описание">
						<br><br>
						<input type="text" class='a7'  name="brand" placeholder="Бренд">
						<br><br>
						<input type="text" class='a7'  name="country" placeholder="Страна произв.">
						<br><br>
						<input type="number" class='a7'  name="kolvo" placeholder="Количество">
						<br><br>
						<input type="text" class='a7' name="all" placeholder="Полное описание">
						<br><br>
						<input type="submit" class='a1' name="tov_add2" value="Добавить товар">
					</form>

				


					<?
				}


				//проверка нажатия кнопки
				if ($_POST['tov_add2']=='Добавить товар'){
					//получение переменных
					$name=$_POST['name'];
					$kategory=$_POST['kategory'];
					$price=$_POST['price'];
					$img=$_POST['img'];
					$about=$_POST['about'];
					$brand=$_POST['brand'];
					$country=$_POST['country'];
					$kolvo=$_POST['kolvo'];
					$all=$_POST['all'];
					//запрос на добавление товара
					$query="INSERT INTO `tovar`(`name`, `kategory`, `price`, 
										`img`, `about`, `brand`, `country`, `kolvo`, `all`) 
								VALUES ('$name','$kategory','$price','$img','$about','$brand',
									    '$country','$kolvo','$all')";
					//отправка запроса
					$result=mysqli_query($conn,$query);
					//сообщение
					echo "<h3>Товар добавлен!</h3><br>";
					echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";
						}

					//проверка нажатия кнопки
					if($_POST['kat_del']=='Удалить'){
						$id=$_POST['id'];

					?>	
					<h3>Вы уверены что хотите удалить категорию?</h3>
					<form action="admin.php" method="post">
						<input type="hidden" name="id" value="<? echo $id;?>">
						<input type="submit" name="kat_del2" value="Удалить категорию">
					</form>
					<form action="admin.php" method="post">
						<input type="submit" value="Нет">
					</form>
					<?
					}
					if($_POST['kat_del2'] =='Удалить категорию'){
						$id=$_POST['id'];
						$query="DELETE FROM `kategory` WHERE `id`='$id' ";
						$result=mysqli_query($conn,$query);
						echo "<h3>Категория удалена!</h3><br>";
						echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";
					}
					?>
					<?
				if($_POST['tov_del']=='Удалить'){
						$id=$_POST['id'];

					?>	
					<h3>Вы уверены что хотите удалить товар?</h3>
					<form action="admin.php" method="post">
						<input type="hidden" name="id" value="<? echo $id;?>">
						<input type="submit" name="tov_del" value="Удалить товар">
					</form>
					<form action="admin.php" method="post">
						<input type="submit" value="Нет">
					</form>
					<?
					}
					if($_POST['tov_del'] =='Удалить товар'){
						$id=$_POST['id'];
						$query="DELETE FROM `tovar` WHERE `id`='$id' ";
						$result=mysqli_query($conn,$query);
						echo "<h3>Товар удален!</h3><br>";
						echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";
					}
					?>
					
					<?
					if($_POST['user_del']=='Удалить'){
						$id=$_POST['id'];

					?>	
					<h3>Вы уверены что хотите удалить пользователя?</h3>
					<form action="admin.php" method="post">
						<input type="hidden" name="id" value="<? echo $id;?>">
						<input type="submit" name="user_del" value="Удалить пользователя">
					</form>
					<form action="admin.php" method="post">
						<input type="submit" value="Нет">
					</form>
					<?
					}
					if($_POST['user_del'] =='Удалить пользователя'){
						$id=$_POST['id'];
						$query="DELETE FROM `user` WHERE `id`='$id' ";
						$result=mysqli_query($conn,$query);
						echo "<h3>Пользователь удален!</h3><br>";
						echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";
					}
					?>

					<?
					//проверка нажатия кнопки
					if ($_POST['kat_red']=='Изменить'){
						//получение переменных
						$id=$_POST['id'];
						//запрос на отображение категорий
						$query="SELECT * FROM `kategory` WHERE `id`='$id'";
						//отправка запроса
						$result=mysqli_query($conn,$query);
						//цикл с выводом данных из БД
						$row=mysqli_fetch_array($result);
					?>

					<form action="admin.php" method="post">
						<input type="hidden" name="id" value="<? echo $row[0]; ?>">
						<p>Наименование категории</p>
						<input type="text" name="name" value="<? echo $row[1]; ?>">
						<input type="submit" name="kat_red2" value="Изменить категорию">
					</form>
					<?
					}
					//проверка нажатия кнопки
					if ($_POST['kat_red2']=='Изменить категорию'){
						//получение переменных
						$id=$_POST['id'];
						$name=$_POST['name'];
						//запрос на отображение категорий
						$query="UPDATE `kategory` SET `name`='$name' WHERE `id`='$id' ";
						//отправка запроса
						$result=mysqli_query($conn,$query);

						echo "<h3>Категория изменена!</h3><br>";
						echo "<h3><a href='admin.php' class='a1' >Обновить страницу</a></h3>";
				}
					?>


				<?
				//проверка нажатия кнопки 
				if ($_POST['user_red']=='Изменить'){
					//олучение переменных
					$id=$_POST['id'];
					$login=$_POST['login'];
					//запрос на отображение товаров
					$query="SELECT * FROM `user` WHERE `id`='$id' ";
					//отправка запроса
					$result=mysqli_query($conn, $query);
					//цикл с выводом данных из БД
					$row=mysqli_fetch_array($result);
					?>
					<form class="a6" action='admin.php' method='post'>
						<input type='hidden' name='id' value='<? echo $row[0] ?>'>
						<input type='file' name='img'>
						<input type='submit' name='user_red2' value='Изменить изображение'>
					</form>
					<form style="text-align:center;" class="a6" action='admin.php' method='post'>
						<input type='hidden' name='id' value='<? echo $row[0] ?>'>
						<p>Логин</p>
						<input class="a7" type='text' name='login' value='<? echo $row[1] ?>'>
						<p>Email</p>
						<input class="a7"  type='text' name='email' value='<? echo $row[2] ?>'>
						<p>Пароль</p>
						<input class="a7"  type='password' name='pass' value='<? echo $row[9] ?>'>
						<p>Подтвердить пароль</p>
						<input class="a7"  type='password' name='pass2' value='<? echo $row[9] ?>'>
						<p>Адрес</p>
						<input class="a7"  type='text' name='adres' value='<? echo $row[4] ?>'>
						<p>Телефон</p>
						<input class="a7"  type='number' name='tel' value='<? echo $row[5] ?>'>
						<p>ФИО</p>
						<input class="a7"  type='text' name='fio' value='<? echo $row[7] ?>'>
						<p>Город</p>
						<input class="a7"  type='text' name='gorod' value='<? echo $row[6] ?>'>
						<p>Дата рождения</p>
						<input  class="a7" type='date' name='dr' value='<? echo $row[8] ?>'>
						<p>Статус</p>
						<select  class="a7" name='status'>
							<option value='0'>Пользователь</option>
							<option value='1'>Администратор</option>
						</select>
						<br><br>
						<input  class="a1" type='submit' name='user_red2' value='Изменить данные'>
					</form>
				<?	
				}
				//проверка нажатия кнопки 
				if ($_POST['user_red2']=='Изменить изображение'){
					//олучение переменных
					$id=$_POST['id'];
					$img=$_POST['img'];
					//запрос на редактирование изображения товара
					$query="UPDATE `user` SET `img`='$img' WHERE `id`='$id' ";
					//отправка запроса
					$result=mysqli_query($conn, $query);
					//сообщение
					echo"<h3>Изображение изменено!</h3><br>";
					echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";
				}
				//проверка нажатия кнопки
					if ($_POST['user_red2']=='Изменить данные'){
						//получение переменных
						$id=$_POST['id'];
						$login=$_POST['login'];
						$email=$_POST['email'];
						$pass=$_POST['pass'];
						$pass2=$_POST['pass2'];
						$adres=$_POST['adres'];
						$tel=$_POST['tel'];
						$dr=$_POST['dr'];
						$gorod=$_POST['gorod'];
						$fio=$_POST['fio'];
						$status=$_POST['status'];
						if ($pass != $pass2) {echo "<p>Пароль не верен</p>"; echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";}
						else{
						
							//запрос на редактирование изображения товара
							$query="UPDATE `user` SET `login`='$login', `email`='$email', `pass`='$pass', `adres`='$adres', `tel`='$tel',
															  `fio`='$fio', `gorod`='$gorod',`dr`='$dr',  `status`='$status' WHERE `id`='$id' ";
							
							//отправка запроса
							$result=mysqli_query($conn, $query);
							echo"<h3>Данные изменены!</h3><br>";
							echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";

						}
						
					}
				
				?>


				<?
				//проверка нажатия кнопки
				if ($_POST['zak_red']=='Изменить'){
					//олучение переменных
					$id=$_POST['id'];
					?>
					<form  action='admin.php' method='post'>
						<input type='hidden' name='id' value='<? echo $id; ?>'>
						<p>Статус заказа</p>
						<select name='status'>
							<option value='Подтвержден'>Подтвержден</option>
							<option value='Отменен'>Отменен</option>
						</select>
						<input type='submit' name='zak_red2' value='Изменить статус'>
					</form>
					<?
				}
				//проверка нажатия кнопки
				if ($_POST['zak_red2']=='Изменить статус'){
					//олучение переменных
					$id=$_POST['id'];
					$status=$_POST['status'];
					//запрос на редактирование изображения товара
					$query="UPDATE `zakaz` SET `status`='$status' WHERE `id`='$id' ";
					//отправка запроса
					$result=mysqli_query($conn, $query);
					//сообщение
					echo"<h3>Статус изменен!</h3><br>";
					echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";
				}
				?>
				
				
				
				<?
				//проверка нажатия кнопки
				if($_POST['zak_del']=='Удалить'){
					//получение переменных
					$id=$_POST['id'];
					?>
					<h3>Вы уверены что хотите удалить заказ?</h3>
					<form action='admin.php' method='post'>
						<input type='hidden' name='id' value='<? echo $id; ?>'>
						<input type='submit' name='zak_del2' value='Удалить заказ'>
					</form>
					<form  action='admin.php' method='post'>
						<input type='submit' value='нет'>
					</form>
				<?
				}
				?>
				
				<?
				//проверка нажатия кнопки
				if($_POST['zak_del2']=='Удалить заказ'){
					//олучение переменных
					$id=$_POST['id'];
					//запрос на добавление категории //название столбца отличается
					$query="DELETE FROM `zakaz` WHERE `id`='$id' ";
					//отправка запроса
					$result=mysqli_query($conn, $query);
					//сообщение
					echo"<h3>Заказ удален</h3><br>";
					echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";
				}
				?>


				<?
				if($_POST['tov_red']=='Изменить'){
					//
					$id=$_POST['id'];
					//
					$query="SELECT * FROM `tovar` WHERE `id`='$id' ";
					//
					$result=mysqli_query($conn,$query);
					//
					$row=mysqli_fetch_array($result)
				?>

				<br><br><br>
				<form class="a6" style="width:400; text-align: center;" action="admin.php" method="post">
					<input class="a7" type="hidden" name="id" value="<? echo $row[0];?>">
					<input class="a7"  type="file" name="img">
					<input style="margin-top: 5;" class="a7"  type="submit" name="tov_red2" value="Изменить изображение">
				</form>
				<form class="a6" style="width:400; text-align:center;"  action="admin.php" method="post">
					<input class="a7"  type="hidden" name="id" value="<? echo $row[0];?>">
					<p style="font-size:22; margin: 5;" >Наименование товара</p>
					<input class="a7"  type="text" name="name" value="<? echo $row[1];?>">
					<p style="font-size:22; margin: 5;" >Цена</p>
					<input class="a7"  type="number" name="price" value="<? echo $row[3];?>">
					<p style="font-size:22; margin: 5;" >Категория</p>
					<select  class="a7" name='kategory'>
					<?
					//
					$query2="SELECT * FROM `kategory`";
					//
					$result2=mysqli_query($conn,$query2);
					//
					while($row2=mysqli_fetch_array($result2)){
					?>
						<option value="<? echo $row2[1]; ?>"><? echo $row2[1];?></option>
					<?
					}
					?>
					</select>
					<p style="font-size:22; margin: 5;">Краткое описание</p>
					<input class="a7"  type="text" name="about" value="<? echo $row[5]; ?>">
					<p style="font-size:22; margin: 5;" >Бренд</p>
					<input class="a7"  type="text" name="brand" value="<? echo $row[6]; ?>">
					<p style="font-size:22; margin: 5;">Страна</p>
					<input  class="a7" type="text" name="country" value="<? echo $row[7]; ?>">
					<p style="font-size:22; margin: 5;" >Количество</p>
					<input  class="a7" type="number" name="kolvo" value="<? echo $row[8]; ?>">
					<p style="font-size:22; margin: 5;" >Полное описание</p>
					<input  class="a7" type="text" name="all" value="<? echo $row[9]; ?>">
					<br>
					<input style="margin: 5;" class="a7" type="submit" name="tov_red2" value="Изменить данные">
				</form>

				<?
			}
			//проверка нажатия кнопки
			if($_POST['tov_red2']=='Изменить изображение'){
				//получение переменных
				$id=$_POST['id'];
				$img=$_POST['img'];
				//запрос на редактирование изображения товара
				$query="UPDATE `tovar` SET `img`='$img' WHERE `id`='$id'";
				//отправка запроса
				$result=mysqli_query($conn,$query);
				//сообщение
				echo "<h3>Изображение изменено!</h3><br>";
				echo "<h3><a href='admin.php' class='a1' >Обновить страницу</a></h3>";
			}
			//
			if($_POST['tov_red2']=='Изменить данные'){
				$id=$_POST['id'];
				$name=$_POST['name'];
				$price=$_POST['price'];
				$kategory=$_POST['kategory'];
				$about=$_POST['about'];
				$brand=$_POST['brand'];
				$country=$_POST['country'];
				$kolvo=$_POST['kolvo'];
				$all=$_POST['all'];
				//
				$query="UPDATE `tovar` SET `name`='$name',`price`='$price',`kategory`='$kategory',`about`='$about',`brand`='$brand',`country`='$country',`kolvo`='$kolvo',`all`='$all' WHERE `id`='$id'";
				//
				$result=mysqli_query($conn,$query);
				//
				echo "<h3>Категория изменена!</h3><br>";
				echo "<h3><a href='admin.php' class='a1' >Обновить страницу</a></h3>";
			}
				?>


				<h3 style="font-size:30px ">Категории</h3>
				<table border=1>
					<tr>
						<th style="font-size:20px; width: 200;">Наименование</th>
						<th></th>
						<th></th>
						
					</tr>
						
						<tr>
						<?
						//запрос на отображение категорий
						$query="SELECT * FROM `kategory`";
						//отправка запроса
						$result=mysqli_query($conn,$query);
						//цикл с выводом данных из БД
						while($row=mysqli_fetch_array($result)){
						?>
						<th style="font-size:20px"><? echo $row[1];?></th>
						<th>
							<form action='admin.php' method='post'>
								<input type='hidden' class='a1' name='id' value='<? echo $row[0]; ?>'>
								<input type='submit' class='a1' name='kat_red' value='Изменить'>
							</form>
						</th>
						<th>
							<form action='admin.php' method='post'>
								<input type='hidden' class='a1' name='id' value='<? echo $row[0]; ?>'>
								<input type='submit' class='a1' name='kat_del' value='Удалить'>
							</form>
						</th>
						</tr>
						<?
						}
						?>
				</table>
				
				
				
				




				<h3 style="font-size:30px ;">Товары</h3>
				<table  style="text-align: center; font-size: 20px;" border=1>
					<tr>
						<th>Изображение</th>
						<th>Наименомание</th>
						<th>Категория</th>
						<th>Цена</th>
						<th>Описание</th>
						<th width="40px">Бренд</th>
						<th>Страна</th>
						<th>Количество</th>
						<th width="80px">Полное описание</th>
						<th></th>
						<th></th>
					</tr>
					<?
					//запрос на отображение категорий
					$query="SELECT * FROM `tovar`";
					//отправка запроса
					$result=mysqli_query($conn,$query);
					//цикл с выводом данных из БД
					while($row=mysqli_fetch_array($result)){
						?>
					<tr>
							<td><img src='tovar/<? echo $row[4];?>' alt='tovar' class = 'tovar_mini'></td>
							<td><? echo $row[1]; ?></td>
							<td><? echo $row[2]; ?></td>
							<td><? echo $row[3]; ?></td>
							<td><? echo $row[5]; ?></td>
							<td><? echo $row[6]; ?></td>
							<td><? echo $row[7]; ?></td>
							<td><? echo $row[8]; ?></td>
							<td><? echo $row[9]; ?></td>
							<td>
								<form action='admin.php' method='post'>
									<input type='hidden' name='id' value='<? echo $row[0]; ?>'>
									<input type='submit' class="a1" name='tov_red' value='Изменить'>
								</form>
							</td>
							<td>
								<form action='admin.php' method='post'>
									<input type='hidden' name='id' value='<? echo $row[0]; ?>'>
									<input type='submit' class="a1" name='tov_del' value='Удалить'>
								</form>
							</td>
						</tr>
						<?
					}
					?>
					
					
				</table>


				<h3 style="font-size:26px" ;>Пользователь</h3>
				<table width="1250px" border=1 style='font-size:22px ;'>
					<tr>
						<th>Изображение</th>
						<th style='width: 50;'>Логин</th>
						<th>Почта</th>
						<th style='width: 100;'>Адрес</th>
						<th>Телефон</th>
						<th style='width: 100;'>Город</th>
						<th style='width: 300;'>ФИО</th>
						<th>Дата рождения</th>
						<th style='width: 50;'>Пароль</th>
						<th style='width: 50;'>Статус</th>
						<th></th>
						<th></th>
					</tr>
					<?
					//запрос на отображение категорий
					$query="SELECT * FROM `user`";
					//отправка запроса
					$result=mysqli_query($conn,$query);
					//цикл с выводом данных из БД
					while($row=mysqli_fetch_array($result)){
						?>
						<tr style="text-align: center;">
							<td><img src='img/<? echo $row[3];?>' alt='tovar' class = 'tovar_mini'></td>
							<td><? echo $row[1]; ?></td>
							<td><? echo $row[2]; ?></td>
							<td><? echo $row[4]; ?></td>
							<td><? echo $row[5]; ?></td>
							<td><? echo $row[6]; ?></td>
							<td><? echo $row[7]; ?></td>
							<td><? echo $row[8]; ?></td>
							<td><? echo $row[9]; ?></td>
							<td><? echo $row[10]; ?></td>
							
							
							<td>
								<form action='admin.php' method='post'>
									<input type='hidden' name='id' value='<? echo $row[0]; ?>'>
									<input type='submit' class="a1" name='user_red' value='Изменить'>
								</form>
							</td>
							<td>
								<form action='admin.php' method='post'>
									<input type='hidden' name='id' value='<? echo $row[0]; ?>'>
									<input type='submit' class="a1" name='user_del' value='Удалить'>
								</form>
							</td>
						</tr>
						<?
					}
					?>
				</table>

				
				
				<h3 style="font-size:30px ;">Заказы</h3>
				<table style='text-align: center;font-size:22px ; width: 1250;' border=1>
					<tr>
						<th>Изображение</th>
						<th>Айди</th>
						<th>Наименование</th>
						<th>Описание</th>
						<th>Количество</th>
						<th style="width: 80;">Цена</th>
						<th style="width: 80;">Логин</th>
						<th>Статус</th>
						<th></th>
						<th></th>
					</tr>

					<?
					//запрос на отображение категорий
					$query="SELECT * FROM `zakaz`";
					//отправка запроса
					$result=mysqli_query($conn,$query);
					//цикл с выводом данных из БД
					while($row=mysqli_fetch_array($result)){
						?>
						<tr>
							<td><img src='tovar/<? echo $row[2];?>' alt='tovar' class = 'tovar_mini'></td>
							<td><? echo $row[1]; ?></td>
							<td><? echo $row[3]; ?></td>
							<td><? echo $row[4]; ?></td>
							<td><? echo $row[5]; ?></td>
							<td><? echo $row[6]; ?></td>
							<td><? echo $row[7]; ?></td>
							<td><? echo $row[8]; ?></td>
							
							
							<td>
							<?
							if ($row[8]=='Новый'){
							?>
								<form action='admin.php' method='post'>
									<input type='hidden' name='id' value='<? echo $row[0]; ?>'>
									<input type='submit' class="a1" name='zak_red' value='Изменить'>
								</form>
							<?
							}
							?>
							</td>
							<td>
							<?
								if ($row[8]=='Новый'){
							?>
								<form action='admin.php' method='post'>
									<input type='hidden' name='id' value='<? echo $row[0]; ?>'>
									<input type='submit' class="a1" name='zak_del' value='Удалить'>
								</form>
								<?
							}
								?>
							</td>
							
						</tr>
						<?
						}
						?>
				</table>
				<br><br>
				
				<?
				}
				else
				{
					echo "<h2 style='font-size:30'>У вас нет доступа!</h2><br>";
					echo "<h3><a href='auto.php' class='a4'>Авторизуйтесь ещё раз</a></h3>";
				}
				?>
				
			</section>
			<!-- right -->
			
		</main>
		<!-- подвал -->
		<!-- Footer -->
	</body>
    <footer>
			<!-- О нас -->
			<div class='a3'>
				<a href='index.php'> Контакт </a> <br> <a>8996-840-75-36</a>
			</div>
			<!-- Политика конфиденциальности -->
			<div class='a3'>
				<a href='index.php' class=''>Почта</a> <br> <a>Vovan@gmail.com</a>
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
    <!-- Footer -->
</div>
<!-- JS -->
<script src="js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS -->
</html>