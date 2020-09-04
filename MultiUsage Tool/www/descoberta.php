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

  $users_name = $_POST['Username'];
  $users_password = $_POST['Password'];
	
	$procura="select IDutilizador from Utilizador where Nome='".$users_name."'and Password='".$users_password."'";
	$result = mysqli_query($liga, $procura);
	
	 while ($row = mysqli_fetch_row($result))
	 {
		echo $row[0];
	 }
?>