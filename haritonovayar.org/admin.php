<?php
session_start();
if ($_POST['vihod']=='Выход'){
	$_SESSION['login']='';
	$_SESSION['pass']='';
	$_SESSION['status']='';
}
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
                <img src='image/st2.png' alt='logo' class='image_logo'>
            </div>
            <!-- Name -->
            <div class='name'>
                <h1><font face='franklin gothic medium'>ShohShop<font></h1>
            </div>
            <!-- vhod -->
			 <div class='vhod'>
				<a href='auto.php' class='a1'><font color='black'>Вход<font></a>
			</div>
			<div class='reg'>
				<a href='reg.php' class='a1'><font color='black'>Регистрация<font></a>
            </div>
			<?
			if ($_SESSION['login']!='1'){
			?>
				<a href='admin.php' class='a1'><font color='black'>Админка<font></a>
				<form action='index.php' method='post' class='a11'>
					<input type='submit' name='vihod' value='Выход'>
				</form>
			<?
			}
			?>
        </header>
		<?
		include 'nav.php';
		?>
		<!-- Menu -->

	<!--Основная Часть-->
		<main>
			<section class='left'>
                <!-- Категории товаров -->
                <?
                //запрос на отображение категорий
                $query="SELECT * FROM kategory";
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
			<section class='center'>
				<?
				if ($_SESSION['status']=='1'){				
					
				?>
				<h2>Панель администратора</h2>
				<?
				//проверка нажатие кнопки
				if ($_POST['kat_add']=='Добавить категорию'){
					?>
						<form action='admin.php' method='post'>
							<input type='text' name='name' placeholder='Название категорий' value=''>
							<input type='submit' name='kat_add2' value='Добавить категорию'>
						</form>
					<?
				}
				//проверка нажатие кнопки
				if ($_POST['kat_add2']=='Добавить категорию'){
					//
					$name=$_POST['name'];
					//
					$query = "INSERT INTO `kategory`(`name`) VALUES ('$name')";
					//
					$result=mysqli_query($conn,$query);
					//
					echo"<h3>Категория добавлена!</h3><br>";
					echo"<h3><a href='admin.php' class='a1'>Обновите страницу</a></h3>";
					
				}
				?>
				
				<?
				//проверка нажатия кнопки
				if ($_POST['tov_add']=='Добавить товар'){
					?>
						<form action='admin.php' method='post' class='tovar'>
							<input type='text' name='name' placeholder='Название товара' value=''>
							<select name="kategory">
						    <?
                            //запрос на отображение категорий
                            $query="SELECT * FROM kategory";
                            //отправка запроса
                            $result=mysqli_query($conn,$query);
                            //цикл с выводом данных из БД
                            while($row=mysqli_fetch_array($result)){
                            ?>
                            <option value='<? echo $row[1]; ?>'><? echo $row[1]; ?></option>
                            <?
                            }
                            ?>
							<input type='number' name='price' placeholder='price' value=''>
							<input type='file' name='img' placeholder='img' value=''>
							<input type='text' name='about' placeholder='about' value=''>
							<input type='text' name='color' placeholder='color' value=''>
							<input type='text' name='material' placeholder='material' value=''>
							<input type='text' name='sire' placeholder='sire' value=''>
							<input type='text' name='all' placeholder='all' value=''>
							<input type='number' name='kolvo' placeholder='kolvo' value=''>
							<input type='submit' name='kat_tov2' value='Добавить товар'>
						</form>
					<?
				}
				//проверка нажатие кнопки
				if ($_POST['kat_tov2']=='Добавить товар'){
					//получение переменных
					$name=$_POST['name'];
					$kategory=$_POST['kategory'];
					$price=$_POST['price'];
					$img=$_POST['img'];
					$about=$_POST['about'];
					$color=$_POST['color'];
					$material=$_POST['material'];
					$sire=$_POST['sire'];
					$all=$_POST['all'];
					$kolvo=$_POST['kolvo'];

					//запрос на добавление товара
					$query = "INSERT INTO `tovar`(`name`, `kategory`, `price`, `img`, `about`, `color`, `material`, `sire`, `all`, `kolvo`) 
								VALUES ('$name','$kategory','$price','$img','$about','$color','$material','$sire','$all','$kolvo')" ;
					//
					$result=mysqli_query($conn,$query);
					//
					echo"<h3>товар добавлен!</h3><br>";
					echo"<h3><a href='admin.php' class='a1'>Обновите страницу</a></h3>";
					
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
							<input type="submit" name="tov_del2" value="Удалить товар">
						</form>
						<form action="admin.php" method="post">
							<input type="submit" value="Нет">
						</form>
						<?
						}
						if($_POST['tov_del2'] =='Удалить товар'){
							$id=$_POST['id'];
							$query="DELETE FROM `tovar` WHERE `id`='$id' ";
							$result=mysqli_query($conn,$query);
							echo "<h3>Товар удален!</h3><br>";
							echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";
						}
					?>
					
					<?	
					 if($_POST['pol_del']=='Удалить'){
							$id=$_POST['id'];

						?>	
						<h3>Вы уверены что хотите Удалить пользователя?</h3>
						<form action="admin.php" method="post">
							<input type="hidden" name="id" value="<? echo $id;?>">
							<input type="submit" name="pol_del2" value="Удалить пользователя">
						</form>
						<form action="admin.php" method="post">
							<input type="submit" value="Нет">
						</form>
						<?
						}
						if($_POST['pol_del2'] =='Удалить пользователя'){
							$id=$_POST['id'];
							$query="DELETE FROM `user` WHERE `id`='$id' ";
							$result=mysqli_query($conn,$query);
							echo "<h3>Удалить пользователь удален!</h3><br>";
							echo "<h3><a href='admin.php' class='a1'>Обновить страницу</a></h3>";
						}
						?>
				
					
				<h2>Категории</h2>
				<table border=1;>
					<tr>
						<td>Наименование </td> 
						<td></td>
						<td></td>
					</tr>
					<?
					//запрос на отображение категорий
					$query="SELECT * FROM kategory";
					//отправка запроса
					$result=mysqli_query($conn,$query);
					//цикл с выводом данных из БД
					while($row=mysqli_fetch_array($result)){
						?>
						
						<tr>
							<th><? echo $row[1]; ?></th>
							
							<td>
								<form action='admin.php' method='post' class='a1'>
									<input type='hidden' name='id' value='<? echo $row[0];?>'>
									<input type='submit' name='kat_reg' value='изменить'>
								</form>
							</td>
							<td>
								<form action='admin.php' method='post' class='a1'>
									<input type='hidden' name='id' value='<? echo $row[0];?>'>
									<input type='submit' name='kat_del' value='Удалить'>
								</form>
							</td>
						</tr>	
						<?
					}
					?>
				</table>
			
				<h2>Товары</h2>
				<table border=1;>
					<tr>
						<th>Изображение</th>
						<th>Наименование</th>
						<th>Цена</th>
						<th>Категории</th>
						<th>Описание</th>
						<th>Цвет</th>
						<th>Материал</th>
						<th>Изготовитель</th>
						<th>Полное описание</th>
						<th></th>
						<th></th>

					</tr>
				
					<?
					//запрос на отображение 
					$query="SELECT * FROM tovar";
					//отправка запроса
					$result=mysqli_query($conn,$query);
					//цикл с выводом данных из БД
					while($row=mysqli_fetch_array($result)){
						?>
						
						<tr>
							<td><img src='tovar/<? echo $row[4];?>' alt='tovar' class='tovar_mini'></td>
							<td><? echo $row[1]; ?></td>
							<td><? echo $row[3]; ?></td>
							<td><? echo $row[2]; ?></td>
							<td><? echo $row[5]; ?></td>
							<td><? echo $row[6]; ?></td>
							<td><? echo $row[7]; ?></td>
							<td><? echo $row[8]; ?></td>
							<td><? echo $row[9]; ?></td>
							<td>
								<form action='admin.php' method='post' class='a1'>
									<input type='hidden' name='id' value='<? echo $row[0];?>'>
									<input type='submit' name='tov_reg' value='изменить'>
								</form>
							</td>
							<td>
								<form action='admin.php' method='post' class='a1'>
									<input type='hidden' name='id' value='<? echo $row[0];?>'>
									<input type='submit' name='tov_del' value='Удалить'>
								</form>
							</td>
						</tr>
						
						
						<?
					}
					?>
				</table>

				<h2>Пользователи</h2>
				<table border=1;>
					<tr>
						<th>Аватар</th>
						<th>Логин</th>
						<th>Пароль</th>
						<th>Майл</th>
						<th>Адресс</th>
						<th>Телефон</th>
						<th>Статус</th>
						<th>ФИО</th>
						<th>Регион</th>
						<th></th>
						<th></th>
					</tr>
					<?
					//запрос на отображение категорий
					$query="SELECT * FROM user";
					//отправка запроса
					$result=mysqli_query($conn,$query);
					//цикл с выводом данных из БД
					while($row=mysqli_fetch_array($result)){
						?>
						
						<tr>
							<td><img src='avatar/<? echo $row[6];?>' alt='avatar' class='tovar_mini'></td>
							<td><? echo $row[1]; ?></td>
							<td><? echo $row[2]; ?></td>
							<td><? echo $row[3]; ?></td>
							<td><? echo $row[4]; ?></td>
							<td><? echo $row[5]; ?></td>
							<td><? echo $row[7]; ?></td>
							<td><? echo $row[8]; ?></td>
							<td><? echo $row[9]; ?></td>
							<td>
								<form action='admin.php' method='post' class='a1'>
									<input type='hidden' name='id' value='<? echo $row[0];?>'>
									<input type='submit' name='pol_reg' value='изменить'>
								</form>
							</td>
							<td>
								<form action='admin.php' method='post' class='a1'>
									<input type='hidden' name='id' value='<? echo $row[0];?>'>
									<input type='submit' name='pol_del' value='Удалить'>
								</form>
							</td>
						</tr>
						
						
						<?
					}
					?>
				</table>	
				<h2>Заказы</h2>
				<table border=1>
					<tr>
						<th>Изображение</th>
						<th>Наименование</th>
						<th>Цена</th>
						<th>Описание</th>
						<th>Количество</th>
						<th>дата</th>
						<th> </th>
						<th> </th>
					</tr>
					<?
					//запрос на отображение категорий
					$query="SELECT * FROM zakaz";
					//отправка запроса
					$result=mysqli_query($conn,$query);
					//цикл с выводом данных из БД
					while($row=mysqli_fetch_array($result)){
						?>
						
						<tr>
							<td><? echo $row[1]; ?></td>
							<td><img src='tovar/<? echo $row[3];?>' alt='tovar' class='tovar_mini'></td>
							<td><? echo $row[2]; ?></td>
							<td><? echo $row[4]; ?></td>
							<td><? echo $row[6]; ?></td>
							<td><? echo $row[5]; ?></td>
							<td><? echo $row[7]; ?></td>
							<td>
								<form action='admin.php' method='post' class='a1'>
									<input type='hidden' name='id' value='<? echo $row[0];?>'>
									<input type='submit' name='kat_reg' value='изменить'>
								</form>
							</td>
							<td>
								<form action='admin.php' method='post' class='a1'>
									<input type='hidden' name='id' value='<? echo $row[0];?>'>
									<input type='submit' name='kat_del' value='удалить'>
								</form>
							</td>
						</tr>
						<?
					}
					?>
				</table>
				<?
				}
				else
				{
					echo '<p>У вас нет доступа</p><br>';
					echo "<p><a href='auto.php' class='a2'>Aвторизуйтесь еще раз</a></p>";
				}
				?>
			</section>
			<!--<section class='right'>
				<img src='image/artur.png' alt='rek_time' class='rek_time'>
			</section>
			--->
		</main>
		<!--Podval-->
		<footer>
			<div class='dannie'>
				<p>г. Якутск, Республика Саха (Якутия)<p>
				<p>8914-262-50-51 (с 9 до 21)<p>
			</div>
			<div class='ssilka'>
				<p>Ссылки:<p><a href='https://vk.com/osyyyk' class=''><font color='black'>VKontakte<font></a>
			</div>
				<div class=''>
			
			</div>
		</footer>
		
	</body>
</html>