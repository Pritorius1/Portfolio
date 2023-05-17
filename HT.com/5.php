<h1>Ряды </h1>
	<h2>упр 1</h2>
	<p>Введите N</p>
	<form action='5.php' method='post'>
		<input type='text' name='N'>
		<input type='submit' name='ypr1' value='Вычислить'>
	</form>
	<?php
		if ($_POST['ypr1']=='Вычислить'){
			$N=$_POST['N'];
			for ($i=0; $i<$N+1; $i++){
				$b=1/pow(2,$i);
				$S=$S+$b;
				$a=-1*$a;
				echo $S.' ';
			}
		}
	?>