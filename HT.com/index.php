
<?
session_start();
if ($_POST['vihod']=='Выход'){
	$_SESSION['login']='';
	$_SESSION['pass']='';
	$_SESSION['status']='';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<!-- TITLE -->
	<title>MajesticMotors</title>
	

	<?php
	include'connect.php';
	?>
	
	<!-- STYLE -->
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/templete.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
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
	    <div class="carouselmg">
		    <div class="main-slide p-t30">
				<div class="post-slide-show no-radius m-b0">
					<div class="post-slide1 owl-carousel owl-btn-center-lr">
						<div class="item">
							<div class="blog-card overlay">
								<div class="blog-card-media">
									<img src="images/blog/large/pic1.png" alt="">
								</div>
								<div class="post-slide-info">
									<h2 class="post-title" style="font-family: CloverDisplay-Bold;">Lamborghini Urus</h2>
									<div class="date">
										<h3>Первый кроссовер от итальянского производителя автомобилей Lamborghini</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="blog-card overlay">
								<div class="blog-card-media">
									<img src="images/blog/large/pic2.png" alt="">
								</div>
								<div class="post-slide-info">
									<h2 class="post-title" style="font-family: CloverDisplay-Bold;">Koenigsegg Regera</h2>
									<div class="date">
										<h3>Самое главное — насколько быстра Regera? Разгон до сотни — 2.8 секунды</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="blog-card overlay">
								<div class="blog-card-media">
									<img src="images/blog/large/pic3.png" alt="">
								</div>
								<div class="post-slide-info">
									<h2 class="post-title" style="font-family: CloverDisplay-Bold;">Tesla Model S</h2>
									<div class="date">
										<h3>Он укладывает на лопатки практически все дорожные суперкары</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    	
    <div class="page-content bg-white">
        <!-- Slider  -->

		<div class="content-block">

            <!-- categories -->
            <div class="container px-4 py-5" id="custom-cards">
			    <h2 class="pb-2 border-bottom">Последние поступления</h2>	
			    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
			      <div class="col">
			        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg LatestArrivals1">
			          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
			            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="font-family: CloverDisplay-Bold;">Lamborghini Urus</h3>

			            <ul class="d-flex list-unstyled mt-auto">
			              
			            </ul>
			          </div>
			        </div>
			      </div>

			      <div class="col">
			        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg LatestArrivals2">
			          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
			            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="font-family: CloverDisplay-Bold;">Koenigsegg Regera</h3>
			            <ul class="d-flex list-unstyled mt-auto">
			              
			            </ul>
			          </div>
			        </div>
			      </div>

			      <div class="col">
			        <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg LatestArrivals3">
			          <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
			            <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold" style="font-family: CloverDisplay-Bold;">Tesla Model S</h3>
			            <ul class="d-flex list-unstyled mt-auto">
			              
			            </ul>
			          </div>
			        </div>
			      </div>
			    </div>
			 </div>
			<div class="section-full bg-white content-inner-2">
				
				
                <div class="container">
                    <div class="row ">
						<section class='center'>
							
							
							<?
							//получение переменных
							$kategory=$_POST['kategory'];
							$i=0;
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
							elseif ($_POST['search']=='Поиск')
							{
								$search_text=$_POST['search_text'];

								$query1="SELECT * FROM `tovar` WHERE `name` LIKE '%$search_text%' ";
							}
							elseif ($_POST['price']=='Цене')
							{
								$i=$_SESSION['chethik'];
								$i++;	
								$_SESSION['chethik']=$i;

								if ($i%2==0)
									$query1="SELECT * FROM `tovar` ORDER BY `tovar`.`price` ASC ";
								else
									$query1="SELECT * FROM `tovar` ORDER BY `tovar`.`price` DESC ";
							}
							elseif ($_POST['brand']=='Бренду')
							{
								$i=$_SESSION['chethik'];
								$i++;	
								$_SESSION['chethik']=$i;

								if ($i%2==0)
									$query1="SELECT * FROM `tovar` ORDER BY `tovar`.`brand` ASC";
								else
									$query1="SELECT * FROM `tovar` ORDER BY `tovar`.`brand` DESC";
							}
							elseif ($_POST['country']=='Стране')
							{
								$i=$_SESSION['chethik'];
								$i++;	
								$_SESSION['chethik']=$i;

								if ($i%2==0)
									$query1="SELECT * FROM `tovar` ORDER BY `tovar`.`country` ASC";
								else
									$query1="SELECT * FROM `tovar` ORDER BY `tovar`.`country` DESC";
							}
							else
							{
								//запрос на отображение товаров
								$query1="SELECT * FROM `tovar`";
							}
							$result = mysqli_query($conn,$query1);
							while($row = mysqli_fetch_array($result)){
							?>
							<div class='tovar'>
								<div class='tovar_img'>
									<img src='tovar/<?echo $row[4];?>' alt='tovar' class='scale tovar_img1'>
								</div>
								<div class='tovar_about'>
									<h3 style="height: 35px;"><?echo $row[1];?></h3>
									<p style="height: 20px;">Цена:<?echo $row[3];?></p>
									<p style="height: 70px;">Описание:<?echo $row[5];?></p>
									<p style="height: 20px;">Страна произ.:<?echo $row[7];?></p>
									<p style="height: 20px;">Цвет:<?echo $row[6];?></p>
									<form action='tovar.php' method='post'>
			                            <input type='submit' class='a4' value='Подробнее'>
			                            <input type='hidden' class='a4' name='id_tov' value='<? echo $row[0];?>'>
			                        </form>
								</div>
							</div>		
							<?
							}
							?>	
				
						</section>
						
					</div>
				</div>
			</div>
			
        </div>

    </div>

	<!-- Footer -->
    <footer>
			<!-- О нас -->
			<div class='a3'>
				<a href='index.php'> Контакт </a> <br> <a>8996-840-75-36</a>
			</div>
			<!-- Политика конфиденциальности -->
			<div class='a3'>
				<a href='index.php' class=''>Почта</a> <br> <a>Wells@gmail.com</a>
			</div>
			<!-- Помошь -->
			<div class='a3'>
				<a href='index.php' class=''>Адрес</a> <br> <a>Пионерская 22/8</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
