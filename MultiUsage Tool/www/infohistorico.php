<?php
	$liga=mysqli_connect('localhost','root','internet');
	if (!$liga)
	{ echo "<p> Error connecting to the BD. </p>";
	exit;
	};

	$escolhebd=mysqli_select_db($liga, 'multiusagetoolDB');
	if(!$escolhebd){
		echo "<br> Error connecting to the BD";
		exit;
	};

  $users_id = $_POST['UsernameID'];
	
	$procura="select utilizacao from Info where IDutilizador='".$users_id."' ORDER BY IDinfo DESC limit 10";
	$result = mysqli_query($liga, $procura);

	 echo '<center><h1>Historico do Utilizador</h1><br></center><center><table>';	
	 while ($row = mysqli_fetch_row($result))
	 {
		echo '<tr>';
		echo '<th>';
		echo $row[0];
		echo '</th>';
		echo '</tr>';
	 }
	 echo '</table></center>';	
?>