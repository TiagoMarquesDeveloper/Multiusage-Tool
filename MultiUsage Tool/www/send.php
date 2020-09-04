<?php

// Do not edit this if you are not familiar with php
error_reporting (E_ALL ^ E_NOTICE);
$post = (!empty($_POST)) ? true : false;
if($post) {
	function ValidateEmail($email){

		$regex = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
		$eregi = preg_replace($regex,'', trim($email));
		
		return empty($eregi) ? true : false;
	}

	$name = stripslashes($_POST['ContactName']);
	$to = trim($_POST['to']);
	$email = strtolower(trim($_POST['ContactEmail']));
	$subject = stripslashes($_POST['subject']);
	$message = stripslashes($_POST['ContactComment']);
	$error = '';
	$Reply=$to;
	$from=$to;
	
	// Check Name Field
	if(!$name) {
		$error .= 'Por favor insira o seu nome.<br />';
	}
	
	// Checks Email Field
	if(!$email) { 
		$error .= 'Por favor insira o seu email.<br />';
	}
	if($email && !ValidateEmail($email)) {
		$error .= 'Por favor insira um email valido.<br />';
	}

	// Checks Subject Field
	if(!$subject) {
		$error .= 'Por favor insira o tema de conversa.<br />';
	}
	
	// Checks Message (length)
	if(!$message || strlen($message) < 3) {
		$error .= "A mensagem tem de ter pelo menos 3 caracteres.<br />";
	}
	
	// Enviar Email
	if(!$error) {
		$messages="From: $email <br>";
		$messages.="Name: $name <br>";
		$messages.="Email: $email <br>";	
		$messages.="Message: $message <br><br>";
		$emailto=$to;
		
		$mail = mail($emailto,$subject,$messages,"from: $from <$Reply>\nReply-To: $Reply \nContent-type: text/html");	
	
		if($mail) {
			echo 'Sucesso';
		}
	} else {
		echo '<div class="error">'.$error.'</div>';
	}

}
?>