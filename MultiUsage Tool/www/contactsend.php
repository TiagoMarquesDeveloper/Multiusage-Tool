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

  $users_Name = $_POST['nome'];
  $users_Email = $_POST['email'];
  $users_Mensagem = $_POST['mensagem'];
  
	$insere = "insert into Contactos values (NULL,'".$users_Name."','".$users_Email."','".$users_Mensagem."')";
	$result = mysqli_query($liga, $insere);
?>