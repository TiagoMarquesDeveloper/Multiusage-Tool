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

  $users_ID = $_POST['IDinfo'];
  $users_texto = $_POST['texto'];
	
	$insere = "insert into Info values (NULL,'".$users_texto."','".$users_ID."')";
	$result = mysqli_query($liga, $insere);
?>